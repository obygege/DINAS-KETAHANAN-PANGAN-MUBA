<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>DKP MUBA</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <!-- Favicons -->
  <link href="assets/img/logo DKP 1.png" rel="icon" />
  <link href="assets/img/logo DKP 1.png" rel="apple-touch-icon" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link
    href="assets/vendor/bootstrap/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
    rel="stylesheet" />
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link
    href="assets/vendor/fontawesome-free/css/all.min.css"
    rel="stylesheet" />
  <link
    href="assets/vendor/glightbox/css/glightbox.min.css"
    rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet" />

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
    <!-- Featured Services Section -->
    <!-- Kegiatan -->
    <section
      id="featured-services"
      class="featured-services section"
      style="
          display: flex;
          justify-content: center;
          align-items: center;
          flex-wrap: wrap;
        ">
      <div class="container">
        <div class="container section-title" data-aos="fade-up">
          <h2>KEGIATAN<br /></h2>
        </div>
        <!-- End Section Title -->

        <div
          class="row gy-4"
          style="display: flex; justify-content: center; flex-wrap: wrap">
          <div
            class="col-xl-3 col-md-6 d-flex justify-content-center"
            data-aos="fade-up"
            data-aos-delay="100">
            <div class="service-item position-relative text-center">
              <img
                src="assets/img/Gambar_pangan_Lokal.jpg"
                alt="Gambar 1"
                style="width: 100%; height: auto" />
              <h4>
                <a href="" class="stretched-link">Gerakan Pangan Murah</a>
              </h4>
              <p>
                Voluptatum deleniti atque corrupti quos dolores et quas
                molestias excepturi
              </p>
              <p class="read-me">Baca Selengkapnya >></p>
            </div>
          </div>

          <div
            class="col-xl-3 col-md-6 d-flex justify-content-center"
            data-aos="fade-up"
            data-aos-delay="200">
            <div class="service-item position-relative text-center">
              <img
                src="assets/img/ogr0e9s8jogbt63.jpeg"
                alt="Gambar 2"
                style="width: 100%; height: auto" />
              <h4>
                <a href="{{ route('profil.b2sa') }}" class="stretched-link">Beragam, Bergizi, Seimbang dan Aman (B2SA)</a>
              </h4>
              <p>
                Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore
              </p>
              <p class="read-me">Baca Selengkapnya >></p>
            </div>
          </div>

          <div
            class="col-xl-3 col-md-6 d-flex justify-content-center"
            data-aos="fade-up"
            data-aos-delay="300">
            <div class="service-item position-relative text-center">
              <img
                src="assets/img/Gambar_pangan_Lokal.jpg"
                alt="Gambar 3"
                style="width: 100%; height: auto" />
              <h4>
                <a href="" class="stretched-link">Bantuan Cadangan Pangan</a>
              </h4>
              <p>
                Excepteur sint occaecat cupidatat non proident, sunt in culpa
                qui officia
              </p>
              <p class="read-me">Baca Selengkapnya >></p>
            </div>
          </div>
          <!-- End Service Item -->
        </div>
      </div>
    </section>
    <!-- /Featured Services Section -->

    <!-- Call To Action Section -->
    <section
      id="call-to-action"
      class="call-to-action section accent-background"
      style="background-color: #00a859">
      <div class="container">
        <div
          class="row justify-content-center"
          data-aos="zoom-in"
          data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>
                "Pangan Muba Maju, Sehat, Berkualitas,<br />
                Berkelanjutan, Seimbang, Aman."
              </h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Call To Action Section -->

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
              <p class="mt-3" id="footer-color">
                <strong>Phone:</strong> <span>+1 5589 55488 55</span>
              </p>
              <p class="footer-color">
                <strong>Email:</strong> <span>info@example.com</span>
              </p>
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
              <li class="footer-color">
                <a href="#">Molestiae accusamus iure</a>
              </li>
              <li class="footer-color">
                <a href="#">Excepturi dignissimos</a>
              </li>
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
    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
    <script>
      function updateDate() {
        const dateElement = document.getElementById("realtime-date");
        const now = new Date();
        const days = [
          "Minggu",
          "Senin",
          "Selasa",
          "Rabu",
          "Kamis",
          "Jumat",
          "Sabtu",
        ];
        const dayName = days[now.getDay()];
        const day = now.getDate();

        dateElement.innerHTML = `${dayName}, ${day}`;
      }

      // Jalankan saat halaman dimuat
      updateDate();
    </script>
</body>

</html>