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

        <!-- About Section -->
        <section id="about" class="about section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>PROGRAM B2SA<br /></h2>
                <p>
                    Program Beragam, Bergizi, Seimbang, dan Aman (B2SA)
                    bertujuan mewujudkan sumber daya manusia yang sehat, aktif, dan
                    produktif melalui peningkatan kualitas konsumsi pangan masyarakat.
                </p>
            </div>
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
                        <h3>MEMBERDAYAKAN MASYARAKAT DAN KELOMPOK TANI MELALUI B2SA</h3>
                        <p class="fst-italic" style="text-align: justify">
                            Program Rumah Pangan B2SA merupakan salah satu inisiatif unggulan
                            Dinas Ketahanan Pangan Kabupaten Musi Banyuasin untuk
                            mengedukasi dan mendorong masyarakat agar mengonsumsi aneka ragam
                            pangan lokal yang bergizi. Melalui program ini, kami berupaya
                            mengurangi ketergantungan pada satu jenis bahan pangan pokok dan
                            memperkenalkan alternatif sumber karbohidrat, protein, serta
                            vitamin yang berasal dari kekayaan alam daerah.
                        </p>
                        <p style="text-align: justify">
                            Secara khusus, program B2SA juga memberikan dukungan penuh
                            kepada para <strong>kelompok tani</strong> di Musi Banyuasin.
                            Bantuan yang disalurkan tidak hanya berupa materi, tetapi juga
                            pembinaan berkelanjutan, yang meliputi:
                        </p>
                        <ul>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Penyuluhan dan pendampingan teknis budidaya.</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Pemberian bantuan bibit unggul dan pupuk organik.</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Pelatihan pengolahan hasil panen untuk meningkatkan nilai jual.</span>
                            </li>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Fasilitasi akses pasar agar hasil panen dapat terserap optimal.</span>
                            </li>
                        </ul>
                        <p style="text-align: justify">
                            Kami mengajak kelompok tani yang aktif dan bersemangat untuk
                            berkolaborasi bersama kami dalam menyukseskan ketahanan pangan
                            daerah.
                        </p>

                        <div class="text-center text-lg-start mt-4">
                            <a href="{{ route('login') }}" class="btn-proposal scrollto">Kirim Proposal/Akses Dashboard User</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /About Section -->
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