<nav>
    <i class='bx bx-menu'></i>
    <form action="#">
    </form>
    <a href="{{ route('admin.profile') }}" class="profile">
        <img src="{{ auth('admin')->user()->avatar ? asset('storage/' . auth('admin')->user()->avatar) : asset('images/default-avatar.png') }}"
            alt="No Profil"
            style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
    </a>
</nav>