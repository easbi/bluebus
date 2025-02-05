@extends('layouts.template3')
@section('content')
<!-- DataTales Example -->
<!-- Page Heading -->

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">


    <!-- Modal Pop-up -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="bookingModalLabel">Detail SPJ</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

<!-- Content Row -->
<div class="row">
    <h1 class="h3 mb-4 text-gray-800">Kalender Hasil SPJ</h1>
    <div class="col-md-12">
        <div id="calendar"></div>
    </div>
    <script>
        var route = @json(route('getBooking'));
    </script>
    <script>

    document.addEventListener('DOMContentLoaded', function () {
      var calendarEl = document.getElementById('calendar');

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
          axios.get(route)
          .then(response => {
            const events = response.data.map(event => {
              return {
                title: event.armada,
                start: event.start,
                end: event.end,
                backgroundColor: armadaColors[event.armada] || "#3498db",
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

          var myModal = new bootstrap.Modal(document.getElementById('bookingModal'));
          myModal.show();
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
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: '{{ session('success') }}',
                    });
                });
            </script>
        @endif
        
        <!-- Menampilkan pesan error jika ada -->
        @if(session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: '{{ session('error') }}',
                    });
                });
            </script>
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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush