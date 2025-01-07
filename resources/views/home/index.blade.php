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

  <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
          <li><a href="{{ route('home') }}" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('booking2') }}">Booking</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="{{asset('public/QuickStart/assets/img/hero-bg-light.webp')}}" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Welcome to <span>ITG</span></h1>
          <p data-aos="fade-up" data-aos-delay="100">Teman Perjalanan Wisata Anda<br></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('booking2') }}" class="btn-get-started">Booking Sekarang</a>
            <a href="h{{asset('public/QuickStart/assets/img/video1.mp4')}}" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Tonton Video</span></a>
          </div>
          <img src="{{asset('public/QuickStart/assets/img/IMG_9255-removebg.png')}}" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section light-background">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Penyewaan Bus</a></h4>
                <p class="description">Penyediaan layanan penyewaan bus pariwisata untuk dalam dan luar kota/kabupaten.</p>
              </div>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Dokumentasi Perjalanan</a></h4>
                <p class="description">Dokumentasikan perjalanan anda bersama Iqbal Transgroup, untuk mengabadikan momen-momen perjalananmu.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Paket Wisata</a></h4>
                <p class="description">Kamu juga bisa konsultasikan mengenai paket wisata yang ingin kamu lakukan bersama kami.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">
          <div class="row gy-4 align-items-center">

            <!-- Konten Teks -->
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
              <p class="who-we-are">Who We Are</p>
              <h3>Temukan Petualangan Baru Anda Bersama Kami</h3>
              <p class="fst-italic">
                Perjalanan Bus yang Nyaman, Aman, dan Terjangkau untuk Semua Kalangan.
              </p>
              <ul>
                <li><i class="bi bi-check-circle"></i> <span>Nikmati kenyamanan dan kemewahan armada bus modern kami.</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Dengan pengemudi profesional dan bus yang terawat.</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Harga terjangkau tanpa mengurangi kualitas layanan.</span></li>
              </ul>
              <a href="{{ route('booking2') }}" class="read-more"><span>Pesan Sekarang</span><i class="bi bi-arrow-right"></i></a>
            </div>

            <!-- Gambar -->
            <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
              <div class="row g-3 justify-content-center">
                <!-- Gambar 1 -->
                <div class="col-md-6 col-12">
                  <img src="{{asset('public/QuickStart/assets/img/bus1.png')}}" class="img-fluid" alt="">
                </div>
                <!-- Gambar 2 -->
                <div class="col-md-6 col-12">
                  <img src="{{asset('public/QuickStart/assets/img/IMG_9257.PNG')}}" class="img-fluid" alt="">
                </div>
              </div>
            </div>

          </div>
        </div>

    </section><!-- /About Section -->

    <!-- Clients Section -->
    <!-- <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{asset('QuickStart/assets/img/clients/client-1.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{asset('QuickStart/assets/img/clients/client-2.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{asset('QuickStart/assets/img/clients/client-3.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{asset('QuickStart/assets/img/clients/client-4.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{asset('QuickStart/assets/img/clients/client-5.png')}}" class="img-fluid" alt="">
          </div>

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{asset('QuickStart/assets/img/clients/client-6.png')}}" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section> -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

            <div class="faq-container">

              <div class="faq-item faq-active">
                <h3>Bagaimana cara memesan bus?</h3>
                <div class="faq-content">
                  <p>Anda dapat memesan tiket bus melalui website ini atau dengan menghubungi nomor kontak layanan konsumen berikut di <a href="wa.me/628526789102"></a>.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Kapan paling lambat saya bisa memesan bus?</h3>
                <div class="faq-content">
                  <p>Anda bisa memesan bus, selagi jadwal yang akan anda booking masih lowong atau tersedia. untuk sementara anda bisa menghubungi terkait ini di nomor kontak layanan konsumen kami.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Apakah saya bisa mengubah jadwal perjalanan setelah pemesanan?</h3>
                <div class="faq-content">
                  <p>Secara teknis ini bisa saja dilakukan dengan memperhatikan ketersediaan armada bus dan jadwal yang ada. Namun, ada baiknya anda membicarakan lebih lanjut mengenai ini kepada layanan konsumen kami.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Apakah tersedia layanan bus khusus untuk acara pribadi?</h3>
                <div class="faq-content">
                  <p>Ya, kami menyediakan layanan sewa bus untuk acara pribadi seperti wisata, pernikahan, dan perjalanan perusahaan. Hubungi kami untuk detail lebih lanjut.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Bagaimana cara menghubungi layanan pelanggan jika saya ingin bertanya lebih lanjut?</h3>
                <div class="faq-content">
                  <p>Anda dapat menghubungi kami melalui: Telp: 075283089</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->
            </div>

          </div><!-- End Faq Column-->

        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Berikut Testimoni dari Konsumen kami sebelumnya</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                 Pelayanannya luar biasa! Kursinya nyaman, dan bus selalu tepat waktu. Saya merasa sangat aman selama perjalanan. Terima kasih atas pengalaman yang menyenangkan!
                </p>
                <div class="profile mt-auto">
                  <img src="{{asset('public/QuickStart/assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                  <h3>Sumarni</h3>
                  <h4>Ibu-Ibu Pengajuan Nurul Ikhlas</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Perjalanan bersama bus ini sangat nyaman, membuat kami bisa menikmati waktu bersama keluarga besar tanpa khawatir soal kenyamanan. Staf bus yang ramah dan fasilitas lengkap membuat perjalanan kami terasa lancar dan menyenangkan. Dengan kapasitas bus yang luas dan perjalanan yang mulus, acara tombongan kami pun menjadi semakin berkesan.
                </p>
                <div class="profile mt-auto">
                  <img src="{{asset('public/QuickStart/assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
                  <h3>Desi Fitriani</h3>
                  <h4>Aktivis</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Saya menggunakan layanan ini untuk perjalanan keluarga besar kami. Semua berjalan lancar, dan stafnya sangat ramah serta membantu. Pegawai kami pun merasa nyaman sepanjang perjalanan.
                </p>
                <div class="profile mt-auto">
                  <img src="{{asset('public/QuickStart/assets/img/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
                  <h3>Jena Suryadi</h3>
                  <h4>Kepala BPS Kota Padang Panjang</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Layanan pelanggan sangat responsif! Saya sempat ingin mengubah jadwal, dan prosesnya sangat mudah. Busnya juga tepat waktu, jadi saya tidak khawatir terlambat sampai tujuan.
                </p>
                <div class="profile mt-auto">
                  <img src="{{asset('public/QuickStart/assets/img/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
                  <h3>Mak Syukur</h3>
                  <h4>Pegawai Dinas Kebersihan</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                 Saya sudah beberapa kali menggunakan layanan bus ini untuk perjalanan acara family gathering kantor kami, dan saya sangat puas. Busnya selalu datang tepat waktu, dan pengemudi sangat profesional dalam berkendara. Saya merasa aman meskipun harus melalui rute yang cukup panjang. Selain itu, fasilitas di dalam bus seperti Wi-Fi dan colokan listrik benar-benar membantu saya untuk tetap produktif selama perjalanan. Saya juga terkesan dengan kebersihan bus dan keramahan kru di dalamnya. Sangat direkomendasikan untuk perjalanan bisnis maupun keluarga besar.
                </p>
                <div class="profile mt-auto">
                  <img src="{{asset('public/QuickStart/assets/img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
                  <h3>Khairul</h3>
                  <h4>Komisioner Bawaslu Kota Padang Panjang</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Hubungi Kami di Detail Kontak berikut</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p>Jalan Balai-Balai No.5, Kota Padang Panjang</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Nomor yang bisa dihubungi</h3>
              <p>+6285382616185</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
              <a href="https://www.instagram.com/iqbaltransgroup/" target="_blank">
                <i class="bi bi-envelope"></i>
              </a>
              <h3>Instagram</h3>
              <p>iqbaltransgroup</p>
            </div>
          </div><!-- End Info Item -->


          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
              <a href="https://www.facebook.com/people/Iqbal-TransGroup/100082727473527/" target="_blank">
                <i class="bi bi-envelope"></i>
              </a>
              <h3>Facebook</h3>
              <p>Iqbal-TransGroup</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15906.37877422848!2d100.4054312!3d-0.4668251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fcfd2b4cbfe1837%3A0x9f1434d32db07531!2sPadang%20Panjang!5e0!3m2!1sen!2sid!4v1676961268712" frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div><!-- End Google Maps -->
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

</body>

</html>