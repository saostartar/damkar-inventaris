<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Damkar Minut') }} - @yield('title')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-red: #dc3545;
            --dark-red: #c82333;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            box-shadow: 0 1px 3px rgba(0, 0, 0, .08);
        }

        header h1 {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        .rounded-3 {
            border-radius: 0.5rem !important;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #f8f9fa;
            border-bottom: 1px solid rgba(0, 0, 0, .1);
            box-shadow: none;
        }

        .navbar .nav-link {
            color: #2c3e50;
            font-weight: 500;
            padding: 1rem 1.2rem;
            transition: all 0.3s ease;
        }

        .navbar .nav-link:hover,
        .navbar .nav-link.active {
            color: var(--primary-red);
        }

        /* Sidebar Styles */
        .sidebar {
            background: #f8f9fa;
            border-right: 1px solid rgba(0, 0, 0, .1);
            padding-top: 1rem;
        }

        .sidebar .nav-link {
            color: #2c3e50;
            padding: 0.8rem 1rem;
            margin-bottom: 0.5rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: var(--primary-red);
            color: white;
        }

        .sidebar .nav-link i {
            width: 1.5rem;
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            background-color: #f8f9fa;
        }

        /* Footer Styles */
        footer {
            background-color: #343a40;
            margin-top: auto;
        }

        footer .social-link {
            transition: all 0.3s ease;
        }

        footer .social-link:hover {
            transform: translateY(-3px);
            color: var(--primary-red) !important;
        }

        /* Custom Transitions */
        .transition {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-3px);
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="py-2 bg-white border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo Pemkab" class="img-fluid"
                            style="max-height: 70px;">
                        <img src="{{ asset('images/logo3.png') }}" alt="Logo Damkar" class="img-fluid"
                            style="max-height: 70px;">
                    </div>
                </div>
                <div class="col">
                    <div class="ms-3">
                        <h1 class="h4 mb-1 fw-bold text-danger">Dinas Pemadam Kebakaran</h1>
                        <p class="mb-0 text-muted">Kabupaten Minahasa Utara</p>
                    </div>
                </div>
                <div class="col-auto ms-auto">
                    <div class="bg-danger text-white px-3 py-2 rounded-3 d-inline-block">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-telephone-fill fs-5 me-2"></i>
                            <div>
                                <div class="fw-bold">Nomor Darurat</div>
                                <div class="small">119</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Navigation -->
    @include('layouts.navigation')

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar - Only for authenticated users -->
            @auth
                @if (auth()->user()->role === 'manager' || auth()->user()->role === 'staff')
                    <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 sidebar d-none d-md-block">
                        @if (auth()->user()->role === 'manager')
                            @include('layouts.partials.manager-sidebar')
                        @else
                            @include('layouts.partials.staff-sidebar')
                        @endif
                    </div>
                    <!-- Main Content with offset for sidebar -->
                    <div class="col-md-9 col-lg-10 ms-auto px-4 py-4 main-content">
                    @else
                        <!-- Main Content without sidebar -->
                        <div class="col-12 px-4 py-4 main-content">
                @endif
            @else
                <!-- Main Content for guests -->
                <div class="col-12 px-4 py-4 main-content">
                @endauth
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-5 text-white">
        <div class="container">
            <div class="row g-4">
                <!-- Agency Info -->
                <div class="col-lg-4">
                    <img src="{{ asset('images/logo2.jpg') }}" alt="Logo Damkar" class="img-fluid mb-3"
                        style="max-height: 80px;">
                    <h5>Dinas Pemadam Kebakaran</h5>
                    <h6 class="text-white-50">Kabupaten Minahasa Utara</h6>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-4">
                    <h5 class="mb-3">Informasi Kontak</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            Kompleks Kantor Bupati Minahasa Utara
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-telephone-fill me-2"></i>
                            (0431) 123456
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-envelope-fill me-2"></i>
                            damkar@minahasautara.go.id
                        </li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div class="col-lg-4">
                    <h5 class="mb-3">Ikuti Kami</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white fs-4 social-link">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="text-white fs-4 social-link">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="text-white fs-4 social-link">
                            <i class="bi bi-youtube"></i>
                        </a>
                        <a href="#" class="text-white fs-4 social-link">
                            <i class="bi bi-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-top mt-4 pt-4 text-center">
                <small class="text-white-50">© {{ date('Y') }} Dinas Pemadam Kebakaran Kabupaten Minahasa Utara. Hak
                    Cipta Dilindungi.</small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
