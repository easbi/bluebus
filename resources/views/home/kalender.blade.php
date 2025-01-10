<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Bus - Iqbal Trans Group</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('public/QuickStart/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('public/QuickStart/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('public/QuickStart/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/QuickStart/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('public/QuickStart/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('public/QuickStart/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/QuickStart/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('public/QuickStart/assets/css/main.css')}}" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="{{asset('public/QuickStart/assets/img/logo.png')}}" alt="">
        <h1 class="sitename">ITG</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="javascript:history.back()" class="active">Home</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Booking Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kalender</h2>
        <p>Cek Kalender Booking Bus untuk menentukan jadwal Anda</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">


        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">


<!-- Content Row -->
<div class="row">
    <!-- Kalender -->
    <div class="col-md-12">
        <div id="calendar"></div>
    </div>
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
                  axios.get('booking2/api/bookings')
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



      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">
    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">IqbalTransGroup</strong><span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('public/QuickStart/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('public/QuickStart/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('public/QuickStart/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('public/QuickStart/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('public/QuickStart/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('public/QuickStart/assets/js/main.js')}}"></script>

  <!-- Full Calender JS -->
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</body>

</html>