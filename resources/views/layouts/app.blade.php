<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #f8c8dc; /* background pink */
        }

        /* Banner "Selamat Datang" */
        .alert-success {
            background-color: #ffe0ef;
            color: #ff69b4; /* teks pink muda, beda dari bg */
            border-color: #f5a9c8;
        }

        /* Navbar POS */
        .navbar, nav {
            background-color: #ffe0ef !important;
            border-bottom: 1px solid #f5a9c8;
        }
        .navbar a, .navbar .nav-link {
            color: #ff69b4 !important;
        }

        /* Judul & heading */
        h1, h2, h3, h4, h5 {
            color: #ff69b4;
        }

        /* Teks default (angka, isi tabel, dll yang tadinya hitam) jadi pink muda */
        body, p, span, div, td, th {
            color: #ff69b4;
        }

        /* Card / kotak ringkasan - efek kaca (glassmorphism) mengikuti warna pink */
        .card,
        .card-header,
        .card-body {
            background: linear-gradient(135deg, rgba(255,255,255,0.35), rgba(255,182,213,0.15)) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.5);
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(244,114,182,0.25), inset 0 1px 1px rgba(255,255,255,0.6);
        }
        .card-header {
            color: #ff69b4;
            border-bottom: 1px solid rgba(255,255,255,0.4);
        }

        /* Tabel (Critical Inventory Status & Best Seller Products) - ikut jadi kaca */
        table,
        .table {
            background: linear-gradient(135deg, rgba(255,255,255,0.35), rgba(255,182,213,0.15)) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            overflow: hidden;
            border-collapse: separate;
            border-spacing: 0;
            box-shadow: 0 8px 24px rgba(244,114,182,0.25), inset 0 1px 1px rgba(255,255,255,0.6);
            --bs-table-bg: transparent;
            --bs-table-color: #ff69b4;
        }
        table th,
        table td {
            background-color: transparent !important;
            color: #ff69b4 !important;
            border-color: rgba(255,255,255,0.4) !important;
        }

        /* wadah lain yang biasanya masih putih bawaan Bootstrap */
        .table-responsive,
        .bg-white,
        .bg-light {
            background: linear-gradient(135deg, rgba(255,255,255,0.35), rgba(255,182,213,0.15)) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
        }

        /* Tombol Logout */
        .btn-danger {
            background-color: #f8c8dc;
            color: #ff69b4;
            border: 1px solid #f5a9c8;
        }
        .btn-danger:hover {
            background-color: #f5b6d1;
            color: #ff69b4;
        }
    </style>
</head>
<body>
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success">
                {{session ('success') }}
            </div>
        @endif

        @yield('content')

    </div>

</body>
</html>