<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Damkar Minut') }} - Dasbor Manager</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-red: #dc3545;
            --dark-red: #c82333;
        }
        
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background: #233446;
            padding-top: 1rem;
        }
        
        .main-content {
            margin-left: 250px;
            padding: 2rem;
            min-height: 100vh;
            background: #f8f9fa;
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.85);
            padding: 0.8rem 1rem;
            margin-bottom: 0.2rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: var(--primary-red);
            color: white;
        }
        
        .sidebar .nav-link i {
            width: 1.5rem;
        }
        
        .card-stats {
            transition: all 0.3s ease;
        }
        
        .card-stats:hover {
            transform: translateY(-5px);
        }
        
        .top-navbar {
            background: white;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="px-3 mb-4">
            <img src="{{ asset('images/logo3.png') }}" alt="Logo Damkar" class="img-fluid" style="max-height: 50px;">
        </div>
        
        <div class="nav flex-column px-3">
            <a href="{{ route('manager.dashboard') }}" class="nav-link {{ request()->routeIs('manager.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            
            <h6 class="text-white-50 text-uppercase px-3 mt-4 mb-2">Loan Management</h6>
            <a href="{{ route('manager.peminjaman.index') }}" class="nav-link {{ request()->routeIs('manager.peminjaman.*') ? 'active' : '' }}">
                <i class="bi bi-clipboard-check"></i> Manage Loans
            </a>

            <h6 class="text-white-50 text-uppercase px-3 mt-4 mb-2">System</h6>
            <a href="{{ route('manager.activities.index') }}" class="nav-link {{ request()->routeIs('manager.activities.*') ? 'active' : '' }}">
                <i class="bi bi-activity"></i> Activity Logs
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="navbar top-navbar mb-4">
            <div class="container-fluid">
                <h4 class="mb-0">@yield('title')</h4>
                <div class="dropdown">
                    <button class="btn btn-link text-dark text-decoration-none dropdown-toggle" type="button" data-bs-toggle="dropdown">
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
        </nav>

        @yield('content')
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>