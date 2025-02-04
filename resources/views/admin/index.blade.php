@extends('layouts.template2')
@section('content')
<!-- DataTales Example -->
<!-- Page Heading -->

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">

<!-- Modal Pop-up -->
<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Detail SPJ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Nama Pemesan:</strong> <span id="modalTitle"></span></p>
                <p><strong>Rute Jemput:</strong> <span id="modalJemput"></span></p>
                <p><strong>Rute Tujuan:</strong> <span id="modalTujuan"></span></p>
                <p><strong>Tanggal Pemesanan:</strong> <span id="modalTglPemesanan"></span></p>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk membuat SPJ -->
<div class="modal fade" id="spjModal" tabindex="-1" role="dialog" aria-labelledby="spjModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="spjModalLabel">Buat SPJ untuk <span id="pemesanName"></span> ?</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk membuat SPJ -->
                <form id="spjForm" action="" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Buat SPJ</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Konfirmasi untuk SPJ yang sudah ada -->
<div class="modal fade" id="confirmSpjModal" tabindex="-1" role="dialog" aria-labelledby="confirmSpjModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmSpjModalLabel">Konfirmasi SPJ untuk Booking ID: <span id="confirmBookingId"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin membuat SPJ lagi untuk booking ini?</p>
                <p>SPJ yang sudah ada: <span id="existingSpjCount"></span> SPJ.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form id="confirmSpjForm" action="" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Ya, Buat SPJ</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Content Row -->
<div class="row">
    <h1 class="h3 mb-4 text-gray-800">Kalender dari SPJ</h1>
    <div class="col-md-12">
        <div id="calendar"></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            // Daftar warna berdasarkan nama armada
            var armadaColors = {
                "ITG-01": "#005d99",
                "ITG-02": "#c0c0c0", 
                "ITG-03": "#ff6f20" 
            };

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                buttonText: {
                    today: 'Hari Ini',
                    month: 'Bulan',
                    week: 'Minggu',
                    day: 'Hari'
                },
                events: function (fetchInfo, successCallback, failureCallback) {
                    axios.get('spj/api/bookings')
                        .then(response => {
                            const events = response.data.map(event => {
                                return {
                                    title: event.armada,  // Menampilkan nama armada di kalender
                                    start: event.start,   // Tanggal mulai
                                    end: event.end,       // Tanggal selesai
                                    backgroundColor: armadaColors[event.armada] || "#3498db", // Warna default biru jika tidak terdaftar
                                    borderColor: armadaColors[event.armada] || "#3498db",
                                    extendedProps: {
                                        title: event.title,
                                        lokasi_jemput: event.lokasi_jemput,
                                        lokasi_tujuan: event.lokasi_tujuan,
                                        tgl_pemesanan: event.tgl_pemesanan
                                    }
                                };
                            });
                            successCallback(events);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            failureCallback(error);
                        });
                },
                eventClick: function (info) {
                    document.getElementById('modalTitle').innerText = info.event.extendedProps.title;
                    document.getElementById('modalJemput').innerText = info.event.extendedProps.lokasi_jemput;
                    document.getElementById('modalTujuan').innerText = info.event.extendedProps.lokasi_tujuan;
                    document.getElementById('modalTglPemesanan').innerText = info.event.extendedProps.tgl_pemesanan;

                    $('#bookingModal').modal('show'); // Tampilkan modal
                }
            });

            calendar.render();
        });
    </script>
</div>

<!-- Content Row -->

<br>
<h1 class="h3 mb-4 text-gray-800">Transaksi Booking</h1>

<link href="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Pemesanan</h6>
    </div>
    <div class="card-body">               
        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Menampilkan pesan error jika ada -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>No HP/ Whatsapp</th>
                        <th>Tujuan</th>
                        <th>Lokasi Penjemputan</th>
                        <th>Tanggal Penjemputan</th>
                        <th>Tanggal Kembali</th>
                        <th>Pengambil Orderan</th>
                        <th>Timestamp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>                                        
                    @foreach ($booking as $booking)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $booking->nama_pemesan }}</td>
                        <td>{{ $booking->no_hp_wa }}</td>
                        <td>{{ $booking->lokasi_tujuan }}</td>
                        <td>{{ $booking->lokasi_jemput }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_penjemputan)->locale('id')->translatedFormat('d-F-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_kembali)->locale('id')->translatedFormat('d-F-Y') }}</td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->created_at)->locale('id')->timezone('Asia/Jakarta')->translatedFormat('d-M-Y H:i:s') }} WIB</td>
                        <td>
                            <form action="{{ route('booking.destroy',$booking->id) }}" method="POST">
                                <a class="btn btn-primary btn-sm" href="{{ route('booking.edit',$booking->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>

                            @php
                                $existingSpj = \App\Models\Sprintj::where('booking_id', $booking->id)->first();
                            @endphp
                            @if (!$existingSpj)
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#spjModal" data-pemesan-name="{{ $booking->nama_pemesan }}" data-booking-id="{{ $booking->id }}" >
                                    Buat SPJ
                                </button>
                            @else
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#confirmSpjModal" data-booking-id="{{ $booking->id }}" data-spj-count="{{ $booking->total_spj }}">
                                    {{ $booking->total_spj }} SPJ
                                </button>
                            @endif                                
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection

@push('scripts')
<!-- Page level plugins -->
<script src="{{asset('public/sbadmin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('public/sbadmin/js/demo/datatables-demo.js')}}"></script>

<!-- Full Calender JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Modal untuk "Buat SPJ"
    $('#spjModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var bookingId = button.data('booking-id');
        var pemesanName = button.data('pemesan-name');

        var modal = $(this);
        modal.find('.modal-title #pemesanName').text(pemesanName);
        var formAction = "{{ route('spj.store2', ':booking_id') }}";
        formAction = formAction.replace(':booking_id', bookingId);
        modal.find('#spjForm').attr('action', formAction); 
    });

    // Modal konfirmasi untuk SPJ yang sudah ada
    $('#confirmSpjModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        var bookingId = button.data('booking-id');
        var spjCount = button.data('spj-count'); 

        var modal = $(this);
        modal.find('.modal-title #confirmBookingId').text(bookingId); 
        modal.find('#existingSpjCount').text(spjCount);

        // Set form action untuk konfirmasi membuat SPJ
        var formAction = "{{ route('spj.store2', ':booking_id') }}";
        formAction = formAction.replace(':booking_id', bookingId);
        modal.find('#confirmSpjForm').attr('action', formAction); 
    });
</script>

@endpush