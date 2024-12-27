<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Bus - Iqbal Trans Group</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('QuickStart/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('QuickStart/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('QuickStart/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('QuickStart/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('QuickStart/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('QuickStart/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('QuickStart/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('QuickStart/assets/css/main.css')}}" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="{{asset('QuickStart/assets/img/logo.png')}}" alt="">
        <h1 class="sitename">ITG</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
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
        <h2>Booking</h2>
        <p>Isikan Form Berikut untuk Booking Bus</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Input Form Disini -->
        <!-- Booking Form -->
        <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label for="name">Nama Pemesan</label>
                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" placeholder="Masukkan Nama Anda" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label for="name">Nomor HP/Whatsapp</label>
                <input type="text" class="form-control" id="no_hp_wa" name="no_hp_wa" placeholder="Masukkan Nama Anda" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="address">Lokasi Tujuan</label>
                <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan Alamat Anda" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label for="tanggal_penjemputan">Tanggal Keberangkatan</label>
                <input type="date" class="form-control" id="tanggal_penjemputan" name="tanggal_penjemputan" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label for="tanggal_kembali">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
              </div>
            </div>
          </div>
          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
        </form>
        <!-- End Booking Form -->

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
  <script src="{{asset('QuickStart/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('QuickStart/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('QuickStart/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('QuickStart/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('QuickStart/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('QuickStart/assets/js/main.js')}}"></script>

</body>

</html>