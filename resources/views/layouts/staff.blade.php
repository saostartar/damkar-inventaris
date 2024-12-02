{{-- resources/views/layouts/staff.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Damkar Minut') }} - Staff Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-blue: #0d6efd;
            --top-nav-height: 60px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f8f9fa;
            padding-top: var(--top-nav-height);
            /* Keep this for navbar spacing */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            /* Remove any default margin */
        }

        .top-nav {
            height: var(--top-nav-height);
            background: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1040;
        }

        .main-content {
            padding: 1.5rem;
            max-width: 1400px;
            width: 100%;
            margin: 0 auto;
        }

        .page-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }

        .nav-link {
            color: #495057;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: all 0.2s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-blue);
            background: #e7f1ff;
        }

        .nav-link i {
            width: 1.5rem;
        }

        .dropdown-menu {
            border: 0;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        .dropdown-item:active {
            background-color: var(--primary-blue);
        }

        .navbar-brand img {
            height: 40px;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                padding: 1rem 0;
            }

            .dropdown-menu {
                border: none;
                padding-left: 1.5rem;
                box-shadow: none;
            }
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <nav class="navbar navbar-expand-lg fixed-top top-nav">
            <div class="container-fluid px-4">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ asset('images/logo2.jpg') }}" alt="Logo Damkar" class="me-2">
                    <span class="d-none d-sm-inline">Staff Portal</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <i class="bi bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="{{ route('staff.dashboard') }}"
                                class="nav-link {{ request()->routeIs('staff.dashboard') ? 'active' : '' }}">
                                <i class="bi bi-house-door"></i> Dashboard
                            </a>
                        </li>

                        <!-- Inventory Management -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('staff.categories.*') ? 'active' : '' }}"
                                data-bs-toggle="dropdown" href="#">
                                <i class="bi bi-box-seam"></i> Inventory
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('staff.categories.index') }}">
                                        <i class="bi bi-list"></i> Categories
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- User Management -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('staff.users.*') ? 'active' : '' }}"
                                data-bs-toggle="dropdown" href="#">
                                <i class="bi bi-people"></i> Users
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('staff.users.index') }}">
                                        <i class="bi bi-list"></i> View All
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('staff.users.create') }}">
                                        <i class="bi bi-person-plus"></i> Add New
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Loans -->
                        <li class="nav-item">
                            <a href="{{ route('staff.loans.index') }}"
                                class="nav-link {{ request()->routeIs('staff.loans.*') ? 'active' : '' }}">
                                <i class="bi bi-clipboard-check"></i> Loans
                            </a>
                        </li>
                    </ul>
                    <form class="d-flex me-3">
                        <div class="input-group">
                            <span class="input-group-text border-end-0 bg-white">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="search" class="form-control border-start-0" placeholder="Search...">
                        </div>
                    </form>
                    <div class="nav-item dropdown">
                        <button class="btn btn-link nav-link dropdown-toggle text-decoration-none"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="main-content">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
