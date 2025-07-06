<div class="sidebar">
    <a href="#" class="logo">
        <img src="../assets/img/logo DKP 1.png" alt="Ikon Kode" style="width: 30px; height: 30px; margin-left: 5%; margin-right: 5%;">
        <div class="logo-name"><span>DKP</span> MUBA</div>
    </a>
    <ul class="side-menu">
        <li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class='bx bxs-dashboard'></i>Dashboard
            </a>
        </li>

        <li class="{{ Request::routeIs('admin.proposals.*') ? 'active' : '' }}">
            <a href="{{ route('admin.proposals.index') }}">
                <i class='bx bxs-file-doc'></i>Data Proposal
            </a>
        </li>

        <li class="{{ Request::routeIs('admin.laporan.*') ? 'active' : '' }}">
            <a href="{{ route('admin.laporan.index') }}">
                <i class='bx bxs-report'></i>Data Laporan
            </a>
        </li>

        <li class="{{ Request::routeIs('admin.users.*') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}">
                <i class='bx bxs-group'></i>
                <span>Daftar User</span>
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