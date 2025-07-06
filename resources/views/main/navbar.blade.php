<div class="nav">
    <div class="logo">
        <img src="assets/img/logo DKP 1.png" alt="Codepen Icon" style="width: 30px; height: 30px;">
        <a href="#" style="font-weight: bold;">Program B2SA</a>
    </div>

    <div class="nav-links">
        <a href="{{ url('/dashboard') }}"
            class="{{ Request::is('dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
            Beranda
        </a>

        <!-- Link Kirim Proposal -->
        <a href="{{ route('proposal.create') }}"
            class="{{ Request::routeIs('proposal.create') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
            Kirim Proposal
        </a>

        <!-- Link Laporan Kegiatan -->
        <a href="{{ route('laporan.index') }}"
            class="{{ Request::routeIs('laporan.index') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
            Laporan Kegiatan
        </a>
    </div>
    <!-- Profil -->
    <div class="right-section">

        <div x-data="{ open: false }" class="relative">

            <div @click="open = !open" class="profile cursor-pointer">
                <div class="info">
                    {{-- Tampilkan avatar user atau default --}}
                    <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/profile.png') }}">
                    <div>
                        {{-- Tampilkan nama dan NIK user --}}
                        <a style="color: white;">{{ auth()->user()->nama }}</a>
                        <p>{{ auth()->user()->nik }}</p>
                    </div>
                </div>
                <i class='bx bx-chevron-down' :class="{'rotate-180': open}" class="transition-transform duration-200"></i>
            </div>

            <div x-show="open"
                @click.away="open = false"
                x-transition
                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50"
                style="display: none;">

                <a href="{{ route('profile.show') }}" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    <i class='bx bx-user text-lg mr-2 text-gray-500'></i>
                    <span>Profil</span>
                </a>

                <div class="border-t border-gray-100 my-1"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <i class='bx bx-log-out text-lg mr-2 text-gray-500'></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- End -->
</div>