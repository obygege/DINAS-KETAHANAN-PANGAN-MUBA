<div class="sidebar">
    <a href="#" class="logo">
        <img src="../assets/img/logo DKP 1.png" alt="Ikon Kode" style="width: 30px; height: 30px; margin-left: 5%; margin-right: 5%;">
        <div class="logo-name"><span>DKP</span> MUBA</div>
    </a>
    <ul class="side-menu">
        <li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class='bx bxs-dashboard'></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="{{ Request::routeIs('admin.laporan.index') ? 'active' : '' }}">
            <a href="{{ route('admin.laporan.index') }}">
                <i class='bx bxs-report'></i>
                <span>Data Laporan</span>
            </a>
        </li>

        <li class="{{ Request::routeIs('admin.berita.*') ? 'active' : '' }}">
            <a href="{{ route('admin.berita.index') }}">
                {{-- Diubah agar lebih sesuai dengan "Berita" --}}
                <i class='bx bxs-news'></i>
                <span>Tambah Berita</span>
            </a>
        </li>

        <li class="{{ Request::routeIs('admin.harga-pangan.*') ? 'active' : '' }}">
            <a href="{{ route('admin.harga-pangan.index') }}">
                {{-- Diubah menjadi ikon label harga --}}
                <i class='bx bxs-purchase-tag-alt'></i>
                <span>Harga Pangan</span>
            </a>
        </li>

        <li class="{{ Request::routeIs('admin.kwt-gallery.index') ? 'active' : '' }}">
            <a href="{{ route('admin.kwt-gallery.index') }}">
                <i class='bx bxs-photo-album'></i>
                <span>Galeri KWT</span>
            </a>
        </li>

        <li class="{{ Request::routeIs('admin.kotak-saran.index') ? 'active' : '' }}">
            <a href="{{ route('admin.kotak-saran.index') }}">
                <i class='bx bxs-inbox'></i>
                <span>Kotak Saran</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="{{ route('logout') }}"
                    class="logout"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    <i class='bx bx-log-out-circle'></i>
                    <span>Logout</span>
                </a>
            </form>
        </li>
    </ul>
</div>