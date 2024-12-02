<!-- resources/views/layouts/navigation.blade.php -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <!-- Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="bi bi-house-door me-1"></i>Beranda
                    </a>
                </li>

                <!-- Profile Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-building me-1"></i>Profil
                    </a>
                    <ul class="dropdown-menu fade-down">
                        <li><a class="dropdown-item" href="{{ route('profile.history') }}">Sejarah</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.duties') }}">Tugas dan Fungsi</a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.structure') }}">Struktur Organisasi</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('profile.logo') }}">Identitas Logo</a></li>
                    </ul>
                </li>

                <!-- Inventory -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('items.index') }}">
                        <i class="bi bi-box-seam me-1"></i>Inventaris</a>
                </li>

                <!-- Contact Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-dots me-1"></i>Kontak
                    </a>
                    <ul class="dropdown-menu fade-down">
                        <li><a class="dropdown-item" href="{{ route('contact.faq') }}">FAQ</a></li>
                        <li><a class="dropdown-item" href="{{ route('contact.complaints') }}">Form Pengaduan</a></li>
                    </ul>
                </li>
            </ul>

            <!-- Auth Links -->
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end fade-down">
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-1"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-clipboard-check me-1"></i>Peminjaman
                        </a>
                        <ul class="dropdown-menu fade-down">
                            <li>
                                <a class="dropdown-item" href="{{ route('guest.loans.index') }}">
                                    <i class="bi bi-clock-history me-1"></i>Riwayat Peminjaman
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Add this to your CSS -->
<style>
    .navbar {
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, .08);
    }

    .navbar .nav-link {
        color: #2c3e50;
        font-weight: 500;
        padding: 1rem 1.2rem;
        transition: all 0.3s ease;
    }

    .navbar .nav-link:hover {
        color: #dc3545;
    }

    .navbar .dropdown-menu {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15);
    }

    .navbar .dropdown-item {
        padding: .7rem 1.2rem;
        transition: all 0.3s ease;
    }

    .navbar .dropdown-item:hover {
        background-color: #dc3545;
        color: #fff;
    }

    .fade-down {
        animation: fadeDown 0.3s ease;
        transform-origin: top center;
    }

    @keyframes fadeDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .navbar .navbar-toggler {
        border: none;
        padding: 0.5rem;
    }

    .navbar .navbar-toggler:focus {
        box-shadow: none;
    }

    .navbar .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
</style>
