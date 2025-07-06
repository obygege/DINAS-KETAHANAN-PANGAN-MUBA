<header id="header" class="header sticky-top">
    <div class="topbar d-flex align-items-center">
        <div
            class="container d-flex justify-content-center justify-content-md-between">
            <div class="d-none d-md-flex align-items-center">
                <i class="bi bi-clock me-1"></i> <span id="realtime-date"></span>
            </div>
            <div class="d-flex align-items-center">
                <i class="bi bi-phone me-1"></i> Kontak Kami (0714)3241072
            </div>
        </div>
    </div>
    <!-- End Top Bar -->

    <div class="branding d-flex align-items-center">
        <div
            class="container position-relative d-flex align-items-center justify-content-end">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <img src="assets/img/logo DKP.png" alt="" />
                <!-- Uncomment the line below if you also wish to use a text logo -->
                <!-- <h1 class="sitename">Medicio</h1>  -->
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}#hero">Beranda</a>
                    </li>

                    <li class="dropdown nav-item">
                        <a href="#" class="{{ request()->routeIs('profil.*') ? 'active' : '' }}">
                            <span>Profile</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul>
                            <li><a href="{{ route('profil.sambutan') }}">Sambutan Kepala Dinas</a></li>
                            <li><a href="{{ route('profil.dasar-hukum') }}">Dasar Hukum</a></li>
                            <li><a href="{{ route('profil.tentang-kami') }}">Tentang Kami</a></li>
                            <li><a href="{{ route('profil.struktur') }}">Struktur Organisasi</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profil.kegiatan') }}">Kegiatan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#contact">Hubungi Kami</a>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div>
</header>