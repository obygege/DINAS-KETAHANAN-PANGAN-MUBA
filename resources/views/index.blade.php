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
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div
        id="hero-carousel"
        class="carousel slide carousel-fade"
        data-bs-ride="carousel"
        data-bs-interval="5000">
        <div class="carousel-item active">
          <img src="assets/img/dkp.png" alt="Dinas Ketahanan Pangan Musi Banyuasin" />
          <div class="container">
            <h2 style="color: white">
              Selamat Datang di Dinas Ketahanan Pangan<br />Kabupaten Musi Banyuasin
            </h2>
            <p>
              Dinas Ketahanan Pangan berkomitmen untuk mewujudkan kedaulatan pangan daerah melalui penyediaan pangan yang cukup, merata, aman, dan bergizi untuk mendukung kehidupan masyarakat yang sehat, aktif, dan produktif.
            </p>
            <a href="#about" class="btn-get-started">Visi & Misi Kami >></a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/Gambar_pangan_Lokal.jpg" alt="Pangan Lokal Musi Banyuasin" />
          <div class="container">
            <h2 style="color: white">Mendorong Konsumsi Pangan Lokal yang Beragam</h2>
            <p>
              Kami mengajak masyarakat Musi Banyuasin untuk memperkaya pola konsumsi dengan memanfaatkan potensi pangan lokal non-beras. Penganekaragaman pangan tidak hanya meningkatkan gizi keluarga, tetapi juga memperkuat ekonomi petani lokal.
            </p>
            <a href="#services" class="btn-get-started">Lihat Program Kami >></a>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/ogr0e9s8jogbt63.jpeg" alt="Pertanian di Musi Banyuasin" />
          <div class="container">
            <h2 style="color: white">Menuju Musi Banyuasin yang Mandiri Pangan</h2>
            <p>
              Melalui inovasi di sektor pertanian, pemberdayaan kelompok tani, dan pengawasan distribusi, kami berupaya membangun sistem pangan yang tangguh dari hulu hingga hilir. Kemandirian pangan adalah kunci kesejahteraan dan stabilitas daerah.
            </p>
            <a href="#portfolio" class="btn-get-started">Galeri Kegiatan >></a>
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#hero-carousel"
          role="button"
          data-bs-slide="prev">
          <span
            class="carousel-control-prev-icon bi bi-chevron-left"
            aria-hidden="true"></span>
        </a>

        <a
          class="carousel-control-next"
          href="#hero-carousel"
          role="button"
          data-bs-slide="next">
          <span
            class="carousel-control-next-icon bi bi-chevron-right"
            aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>
      </div>
    </section>
    <!-- /Hero Section -->

    <!-- Running Text -->
    <!-- Running Text -->
    <a href="{{ route('harga.download.pdf') }}" title="Klik untuk mengunduh laporan PDF Harga Pangan">

      <div class="running-text-container"
        style="cursor: pointer; background-color: #D0DA09;">
        <div class="running-text">
          <span>Harga Pangan Terkini : </span>
          @if(isset($semua_harga) && $semua_harga->isNotEmpty())
          @foreach($semua_harga as $harga)
          <span>{{ $harga->nama_pangan }} - Rp. {{ number_format($harga->harga_pangan, 0, ',', '.') }}, </span>
          @endforeach
          @else
          <span>Data harga pangan belum tersedia saat ini.</span>
          @endif
        </div>
      </div>

    </a>
    <!-- Running Text End -->
    <!-- Running Text End -->

    <!-- Featured Services Section -->
    <!-- Berita -->
    <section id="featured-services" class="featured-services section">
      <div class="container">
        <div class="container section-title" data-aos="fade-up">
          <h2>BERITA<br /></h2>
        </div>
        <!-- End Section Title -->

        <div class="row gy-4">
          {{-- Letakkan kode ini di bagian Berita pada halaman depanmu --}}
          <div class="row gy-4">

            {{-- Lakukan perulangan untuk setiap berita yang dikirim dari controller --}}
            @forelse($berita_terbaru as $berita)
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
              <div class="service-item position-relative">

                {{-- Ganti src gambar dengan gambar dari database --}}
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid" style="height: 220px; width: 100%; object-fit: cover;" />

                {{-- Ganti href dan judul dengan data dari database --}}
                <h4><a href="{{ route('berita.show', $berita->id) }}" class="stretched-link">{{ $berita->judul }}</a></h4>

                {{-- Ganti paragraf dengan cuplikan konten dari database --}}
                <p>{{ \Illuminate\Support\Str::limit(strip_tags($berita->konten), 100, '...') }}</p>

                {{-- Link "Baca Selengkapnya" juga diarahkan ke halaman detail --}}
                <a href="{{ route('berita.show', $berita->id) }}" class="read-me">Baca Selengkapnya >></a>
              </div>
            </div>
            @empty
            {{-- Tampilkan ini jika tidak ada berita sama sekali --}}
            <div class="col-12 text-center">
              <p>Belum ada berita untuk ditampilkan.</p>
            </div>
            @endforelse

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

    <!-- About Section -->
    <section id="about" class="about section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>TENTANG KAMI<br /></h2>
        <p>
          Dinas Ketahanan Pangan mempunyai tugas membantu Bupati
          menyelenggarakan urusan pemerintahan di bidang Pangan yang menjadi
          kewenangan daerah dan tugas pembantuan yang ditugaskan kepada
          Provinsi.
        </p>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">
          <div
            class="col-lg-6 position-relative align-self-start"
            data-aos="fade-up"
            data-aos-delay="100">
            <img src="assets/img/dkp.png" class="img-fluid" alt="" />
            <a
              href="https://youtu.be/1Zlqc1JpYPw?si=X5GhPWSXaKLvIsex"
              class="glightbox pulsating-play-btn"></a>
          </div>
          <div
            class="col-lg-6 content"
            data-aos="fade-up"
            data-aos-delay="200">
            <h3>DINAS KETAHANAN PANGAN <br />MUSI BANYUASIN</h3>
            <p class="fst-italic" style="text-align: justify">
              Dinas Ketahanan Pangan Kabupaten Musi Banyuasin bertanggung
              jawab atas ketersediaan, distribusi, dan konsumsi pangan yang
              cukup, aman, serta bergizi bagi masyarakat. Dalam upaya
              meningkatkan ketahanan pangan, dinas ini melaksanakan berbagai
              program strategis, salah satunya Gerakan Pangan Murah (GPM) yang
              bertujuan menstabilkan pasokan dan harga pangan. Program ini
              bekerja sama dengan PT Petro Muba dan Perum Bulog untuk
              menyediakan bahan pangan dengan harga terjangkau bagi
              masyarakat. Selain itu, dinas ini juga aktif dalam program Rumah
              Pangan Beragam, Bergizi, Seimbang, dan Aman (B2SA) guna
              mendorong konsumsi pangan sehat dan berkualitas. Hingga saat
              ini, program tersebut telah diterapkan di berbagai lokasi di
              Musi Banyuasin dan terus dikembangkan. Dalam aspek kebijakan,
              Dinas Ketahanan Pangan menyusun Rencana Strategis (Renstra)
              sebagai pedoman dalam mengembangkan ketahanan pangan daerah.
              Struktur organisasi dan tugasnya diatur dalam Peraturan Bupati
              Nomor 291 Tahun 2021, yang memastikan efektivitas pelaksanaan
              program guna mendukung ketahanan pangan di Kabupaten Musi
              Banyuasin.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- /About Section -->

    <script>
      document.getElementById("current-date").innerText =
        new Date().getDate();
    </script>
    </div>
    </div>
    </section>
    <!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>LINK TERKAIT</h2>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">
          <div
            class="col-lg-4 col-md-6"
            data-aos="fade-up"
            data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon">
                <img
                  src="assets/img/MUBAKAB.jpg"
                  alt="Logo Pemkab Muba"
                  width="50"
                  height="50" />
              </div>
              <a href="https://mubakab.go.id/" target="_blank" class="stretched-link">
                <h3>Pemkab Musi Banyuasin</h3>
              </a>
              <p>
                Portal resmi Pemerintah Kabupaten Musi Banyuasin, pusat informasi
                seputar kebijakan dan layanan publik daerah.
              </p>
            </div>
          </div>
          <div
            class="col-lg-4 col-md-6"
            data-aos="fade-up"
            data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <img
                  src="assets/img/BAPANAS.jpg"
                  alt="Logo Badan Pangan Nasional"
                  width="50"
                  height="50" />
              </div>
              <a href="https://badanpangan.go.id/" target="_blank" class="stretched-link">
                <h3>Badan Pangan Nasional</h3>
              </a>
              <p>
                Lembaga pemerintah pusat yang bertanggung jawab atas perumusan
                kebijakan dan stabilisasi ketahanan pangan nasional.
              </p>
            </div>
          </div>
          <div
            class="col-lg-4 col-md-6"
            data-aos="fade-up"
            data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <img
                  src="assets/img/KEMENTRIANPERTANIAN.jpg"
                  alt="Logo Kementerian Pertanian"
                  width="50"
                  height="50" />
              </div>
              <a href="https://www.pertanian.go.id/" target="_blank" class="stretched-link">
                <h3>Kementerian Pertanian RI</h3>
              </a>
              <p>
                Situs resmi Kementerian Pertanian, menyediakan informasi seputar
                pertanian, regulasi, dan program nasional.
              </p>
            </div>
          </div>
          <div
            class="col-lg-4 col-md-6"
            data-aos="fade-up"
            data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <img
                  src="assets/img/DKPSUMSEL.jpg"
                  alt="Logo DKPP Sumsel"
                  width="50"
                  height="50" />
              </div>
              <a href="https://dkpp.sumselprov.go.id/" target="_blank" class="stretched-link">
                <h3>DKPP Provinsi Sumsel</h3>
              </a>
              <p>
                Situs Dinas Ketahanan Pangan dan Peternakan Provinsi Sumatera
                Selatan, sebagai mitra kerja dalam lingkup provinsi.
              </p>
            </div>
          </div>
          <div
            class="col-lg-4 col-md-6"
            data-aos="fade-up"
            data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <img
                  src="assets/img/BPSMUBA.jpg"
                  alt="Logo BPS Muba"
                  width="50"
                  height="50" />
              </div>
              <a href="https://mubakab.bps.go.id/" target="_blank" class="stretched-link">
                <h3>BPS Musi Banyuasin</h3>
              </a>
              <p>
                Akses data statistik resmi terkait sektor pertanian, kependudukan,
                dan ekonomi di Kabupaten Musi Banyuasin.
              </p>
            </div>
          </div>
          <div
            class="col-lg-4 col-md-6"
            data-aos="fade-up"
            data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <img
                  src="assets/img/KEMENTRIANPERDAGANGAN.jpg"
                  alt="Logo Kementerian Perdagangan"
                  width="50"
                  height="50" />
              </div>
              <a href="https://www.kemendag.go.id/" target="_blank" class="stretched-link">
                <h3>Kementerian Perdagangan RI</h3>
              </a>
              <p>
                Situs resmi Kementerian Perdagangan, menyediakan informasi regulasi
                terkait distribusi dan stabilitas harga bahan pokok.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Services Section -->

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>GALERI KWT</h2>
        <p>
          Potret Semangat dan Karya Kelompok Wanita Tani [KWT]. Inilah cerita kami dalam membangun ketahanan pangan dan pemberdayaan dari halaman rumah.
        </p>
      </div>
      <!-- End Section Title -->

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
              "centeredSlides": true,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 0
                },
                "768": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                },
                "1200": {
                  "slidesPerView": 5,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            @forelse ($kwt_galleries as $gallery)
            <div class="swiper-slide">
              <a class="glightbox" data-gallery="images-gallery" href="{{ asset('storage/' . $gallery->gambar) }}">
                <img src="{{ asset('storage/' . $gallery->gambar) }}" class="img-fluid" alt="Galeri KWT" />
              </a>
            </div>
            @empty
            <div class="swiper-slide">
              <p class="text-center w-100">Galeri masih kosong.</p>
            </div>
            @endforelse

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    <!-- /Gallery Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>
          Dinas Ketahanan Pangan Muba siap melayani. Untuk pertanyaan, saran, atau permintaan informasi, silakan hubungi kami melalui detail kontak di bawah.
        </p>
      </div>
      <!-- End Section Title -->

      <div class="mb-5" data-aos="fade-up" data-aos-delay="200">
        <iframe
          style="border: 0; width: 100%; height: 370px"
          src="https://www.google.com/maps/embed?pb=!4v1743100114813!6m8!1m7!1sPBwLHEmY_6PNnCsImww4pA!2m2!1d-2.887190104502166!2d103.8394480958306!3f17.688269!4f0!5f0.7820865974627469"
          frameborder="0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <!-- End Google Maps -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="row gy-4">
              <div class="col-lg-12">
                <div
                  class="info-item d-flex flex-column justify-content-center align-items-center"
                  data-aos="fade-up"
                  data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>Serasan Jaya, Kec. Sekayu, Kabupaten Musi Banyuasin, Sumatera Selatan 30711</p>
                </div>
              </div>
              <!-- End Info Item -->

              <div class="col-md-6">
                <div
                  class="info-item d-flex flex-column justify-content-center align-items-center"
                  data-aos="fade-up"
                  data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>(0714)3241072</p>
                </div>
              </div>
              <!-- End Info Item -->

              <div class="col-md-6">
                <div
                  class="info-item d-flex flex-column justify-content-center align-items-center"
                  data-aos="fade-up"
                  data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>dkp@mubakab.go.id</p>
                </div>
              </div>
              <!-- End Info Item -->
            </div>
          </div>

          <div class="col-lg-6">
            <div class="php-email-form">
              <form action="{{ route('contact.store') }}" method="post" id="laravel-contact-form">
                @csrf

                @if(session('success_contact'))
                <div class="my-3">
                  <div class="sent-message" style="display: block;">{{ session('success_contact') }}</div>
                </div>
                @endif

                @if ($errors->any())
                <div class="my-3">
                  <div class="error-message" style="display: block;">
                    <p class="fw-bold mb-1">Terjadi kesalahan. Harap periksa kembali isian Anda.</p>
                  </div>
                </div>
                @endif

                <div class="row gy-4">
                  <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Nama Anda" required value="{{ old('name') }}">
                  </div>

                  <div class="col-md-6">
                    <input type="email" class="form-control" name="email" placeholder="Email Anda" required value="{{ old('email') }}">
                  </div>

                  <div class="col-md-12">
                    <input type="text" name="subject" class="form-control" placeholder="Subjek" required value="{{ old('subject') }}">
                  </div>

                  <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="4" placeholder="Pesan" required>{{ old('message') }}</textarea>
                  </div>

                  <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message"></div>

                    <button type="submit">Kirim Pesan</button>
                  </div>
                </div>
              </form>
            </div>
            <script>
              // Script ini akan berjalan setelah semua elemen halaman dimuat
              document.addEventListener('DOMContentLoaded', function() {
                // Cari form spesifik kita berdasarkan ID yang baru dibuat
                const laravelForm = document.getElementById('laravel-contact-form');

                // Jika form-nya ada di halaman ini
                if (laravelForm) {
                  // Kita pasang "penjaga" pada event 'submit'
                  laravelForm.addEventListener('submit', function(event) {
                    // Perintah ini akan menghentikan event agar tidak "didengar"
                    // oleh script lain dari template.
                    event.stopPropagation();
                  }, true); // Opsi 'true' memastikan script kita bereaksi lebih dulu
                }
              });
            </script>
            <!-- End Contact Form -->
          </div>
        </div>
    </section>
    <!-- /Contact Section -->
  </main>

  @include('layout.footer')

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