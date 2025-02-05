<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Bus - Iqbal Trans Group</title>

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
  
  <!-- Main CSS File -->
  <link href="{{asset('public/QuickStart/assets/css/main.css')}}" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center">
      <a href="#" class="logo d-flex align-items-center me-auto">
        <img src="{{asset('public/QuickStart/assets/img/logo.png')}}" alt="">
        <h1 class="sitename">ITG</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="javascript:history.back()" class="active">Home</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main class="main">
    <section id="kalender" class="section">
      <div class="container section-title">
        <h2>Kalender</h2>
        <p>Cek Kalender Booking Bus untuk menentukan jadwal Anda</p>
      </div>

      <div class="container">
        <div id="calendar"></div>
      </div>
    </section>

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

  </main>

  <footer class="footer">
    <div class="container text-center">
      <p>© Copyright <strong class="px-1 sitename">IqbalTransGroup</strong> All Rights Reserved</p>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>  
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
          axios.get('booking2/api/bookings')
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

</body>
</html>
