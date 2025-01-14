@extends('layouts.template3')
@section('content')
<!-- DataTales Example -->
<!-- Page Heading -->

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">


<!-- Content Row -->
<div class="row">
    <h1 class="h3 mb-4 text-gray-800">Kalender Booking</h1>
    <div class="col-md-12">
        <div id="calendar"></div>
    </div>
    <script>
        var route = @json(route('getBooking'));
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'id', // Setel locale menjadi bahasa Indonesia
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        buttonText: { // Menyesuaikan teks tombol
            today: 'Hari Ini',
            month: 'Bulan',
            week: 'Minggu',
            day: 'Hari'
        },
        events: function (fetchInfo, successCallback, failureCallback) {
            axios.get(route)
                .then(response => {
                    // Sesuaikan data untuk FullCalendar
                    const events = response.data.map(event => {
                        // Tambahkan 1 hari ke 'end' hanya untuk tampilan
                        const adjustedEnd = new Date(event.end);
                        adjustedEnd.setDate(adjustedEnd.getDate() + 1);
                        return {
                            ...event,
                            end: adjustedEnd.toISOString().split('T')[0] // Format kembali ke 'YYYY-MM-DD'
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
            const start = new Date(info.event.start).toLocaleDateString();
            const end = info.event.end
                ? new Date(info.event.end).toLocaleDateString()
                : 'Tidak tersedia';
            const description = info.event.extendedProps.description || 'Deskripsi tidak tersedia';

            alert(`Deskripsi: ${description}`);
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
@endpush