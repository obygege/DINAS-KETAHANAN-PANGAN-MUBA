<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>DKP MUBA</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/logo DKP 1.png" rel="icon">
  <link href="assets/img/logo DKP 1.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  @include('layout.navbar')

  <main class="main">
    <!-- Profile & News Section Start -->
    <section>
      <div class="container" style="display: flex; flex-wrap: wrap;">

        <!-- Profil -->
        <div style="flex: 2; min-width: 300px; padding-right: 20px; border: 2px solid black;"
          data-aos="fade-up">
          <h2 style="text-align: center; font-weight: bold; margin-top: 5%;">DASAR HUKUM</h2>
          <p style="text-align: justify; margin-top: 20px; margin-left: 35px; padding-right: 20px;">
            Dalam rangka mendukung penyelenggaraan ketahanan pangan yang baik dan berkelanjutan di Kabupaten Musi Banyuasin, Dinas Ketahanan Pangan berlandaskan pada berbagai regulasi dan dasar hukum yang berlaku di Indonesia. Beberapa dasar hukum yang menjadi acuan bagi kebijakan dan program ketahanan pangan adalah sebagai berikut:
          </p>

          <ul style="margin-left: 35px; padding-right: 20px;">
            <li><strong>Undang-Undang Nomor 18 Tahun 2012 tentang Pangan</strong>: Undang-Undang ini mengatur tentang penyelenggaraan pangan yang aman, bergizi, dan terjangkau untuk seluruh rakyat Indonesia. Ini menjadi landasan hukum dalam pengelolaan ketahanan pangan di tingkat nasional dan daerah.</li>
            <li><strong>Undang-Undang Nomor 19 Tahun 2013 tentang Perlindungan dan Pemberdayaan Petani</strong>: Mengatur perlindungan terhadap petani sebagai pelaku utama dalam penyediaan pangan di Indonesia, serta pemberdayaan mereka untuk meningkatkan produktivitas dan kesejahteraan.</li>
            <li><strong>Peraturan Pemerintah Nomor 17 Tahun 2015 tentang Ketahanan Pangan dan Gizi</strong>: Peraturan ini memberikan petunjuk teknis mengenai penyelenggaraan ketahanan pangan yang mencakup ketersediaan pangan, akses pangan, serta pemanfaatan pangan bagi seluruh masyarakat.</li>
            <li><strong>Peraturan Menteri Pertanian Nomor 39 Tahun 2015 tentang Pedoman Umum Penyusunan Rencana Aksi Daerah Ketahanan Pangan</strong>: Merupakan pedoman bagi pemerintah daerah dalam merancang program ketahanan pangan yang sesuai dengan kondisi daerah masing-masing, termasuk di Kabupaten Musi Banyuasin.</li>
            <li><strong>Peraturan Menteri Kesehatan Republik Indonesia Nomor 41 Tahun 2014 tentang Gizi Seimbang</strong>: Menjamin bahwa kebijakan pangan yang dilaksanakan dapat mendukung tercapainya gizi seimbang bagi masyarakat, sebagai bagian dari upaya ketahanan pangan yang berkelanjutan.</li>
          </ul>

          <p style="text-align: justify; margin-left: 35px; padding-right: 20px;">
            Dasar hukum tersebut memberikan arah dan landasan yang kuat dalam menjalankan berbagai kebijakan dan program ketahanan pangan di Kabupaten Musi Banyuasin. Dengan berlandaskan pada regulasi ini, Dinas Ketahanan Pangan Muba berupaya memastikan ketersediaan pangan yang cukup, bergizi, dan aman bagi masyarakat.
          </p>
        </div>

        <!-- Berita -->
        <div style="flex: 1; min-width: 300px;" data-aos="fade-up">
          <div class="container section-title">
            <h2 margin-top: 20px;>BERITA</h2>
          </div>

          <div class="row gy-4" style="margin-left: 0; margin-right: 0; margin-top: -20%;">
            <div class="swiper beritaSwiper" style="width: 100%; padding: 10px;">
              <div class="swiper-wrapper">

                <div class="swiper beritaVerticalSwiper" style="height: 700px; overflow: hidden;">
                  <div class="swiper-wrapper">

                    {{-- Lakukan perulangan untuk setiap berita yang ada di variabel $berita_terbaru --}}
                    @forelse($berita_terbaru as $berita)
                    <div class="swiper-slide">
                      <div style="border: 1px solid #ddd; padding: 10px; height: 100%; display: flex; flex-direction: column;">

                        {{-- Gambar Berita --}}
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" style="width: 100%; height: 50%; object-fit: cover; display: block; margin: auto; margin-bottom: 15px;">

                        <div style="flex-grow: 1;">
                          {{-- Judul Berita --}}
                          <h4><a href="{{ route('berita.show', $berita->id) }}" class="stretched-link" style="font-weight: bold;">{{ $berita->judul }}</a></h4>

                          {{-- Cuplikan Konten --}}
                          <p>{{ \Illuminate\Support\Str::limit(strip_tags($berita->konten), 80, '...') }}</p>
                        </div>

                        {{-- Link Baca Selengkapnya --}}
                        <a href="{{ route('berita.show', $berita->id) }}" class="read-me" style="margin-top: auto;">Baca Selengkapnya >></a>
                      </div>
                    </div>
                    @empty
                    {{-- Tampilan ini akan muncul jika tidak ada berita sama sekali di database --}}
                    <div class="swiper-slide">
                      <div style="border: 1px solid #ddd; padding: 10px; text-align: center;">
                        <p>Belum ada berita untuk ditampilkan saat ini.</p>
                      </div>
                    </div>
                    @endforelse

                  </div>

                  <div class="swiper-button-next" style="color: black;"></div>
                  <div class="swiper-button-prev" style="color: black;"></div>
                </div>
              </div>
            </div>
    </section>
    <!-- Profile & News Section End -->

    </div>

    </div>

    </section><!-- /Featured Services Section -->
  </main>

  <footer id="footer" class="footer light-background">
    <div class="wave">
      <div class="wave" id="wave1"></div>
      <div class="wave" id="wave2"></div>
      <div class="wave" id="wave3"></div>
      <div class="wave" id="wave4"></div>
    </div>
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename" id="footer-color">DKP MUBA</span>
          </a>
          <div class="footer-contact pt-3">
            <p class="footer-color">A108 Adam Street</p>
            <p class="footer-color">New York, NY 535022</p>
            <p class="mt-3" id="footer-color"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p class="footer-color"><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x" id="footer-color"></i></a>
            <a href=""><i class="bi bi-facebook" id="footer-color"></i></a>
            <a href=""><i class="bi bi-instagram" id="footer-color"></i></a>
            <a href=""><i class="bi bi-linkedin" id="footer-color"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4 class="footer-color">Useful Links</h4>
          <ul>
            <li class="footer-color"><a href="#">Home</a></li>
            <li class="footer-color"><a href="#">About us</a></li>
            <li class="footer-color"><a href="#">Services</a></li>
            <li class="footer-color"><a href="#">Terms of service</a></li>
            <li class="footer-color"><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4 class="footer-color">Our Services</h4>
          <ul>
            <li class="footer-color"><a href="#">Web Design</a></li>
            <li class="footer-color"><a href="#">Web Development</a></li>
            <li class="footer-color"><a href="#">Product Management</a></li>
            <li class="footer-color"><a href="#">Marketing</a></li>
            <li class="footer-color"><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4 class="footer-color">Hic solutasetp</h4>
          <ul>
            <li class="footer-color"><a href="#">Molestiae accusamus iure</a></li>
            <li class="footer-color"><a href="#">Excepturi dignissimos</a></li>
            <li class="footer-color"><a href="#">Suscipit distinctio</a></li>
            <li class="footer-color"><a href="#">Dilecta</a></li>
            <li class="footer-color"><a href="#">Sit quas consectetur</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4 class="footer-color">Nobis illum</h4>
          <ul>
            <li class="footer-color"><a href="#">Ipsam</a></li>
            <li class="footer-color"><a href="#">Laudantium dolorum</a></li>
            <li class="footer-color"><a href="#">Dinera</a></li>
            <li class="footer-color"><a href="#">Trodelas</a></li>
            <li class="footer-color"><a href="#">Flexo</a></li>
          </ul>
        </div>

      </div>
    </div>
    <p class="footer-color">@2025 Futura_Link | All Rights Reserved</p>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <!-- Swipper -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".beritaVerticalSwiper", {
      direction: "vertical",
      slidesPerView: 2,
      spaceBetween: 20,
      mousewheel: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      loop: false,
    });
  </script>
  <!-- Swipper End -->

  <script>
    function updateDate() {
      const dateElement = document.getElementById("realtime-date");
      const now = new Date();
      const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
      const dayName = days[now.getDay()];
      const day = now.getDate();

      dateElement.innerHTML = `${dayName}, ${day}`;
    }

    // Jalankan saat halaman dimuat
    updateDate();
  </script>

</body>

</html>