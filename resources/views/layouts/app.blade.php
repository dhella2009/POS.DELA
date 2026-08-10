<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #fdf2f8; /* background pink */
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        /* Banner "Selamat Datang" */
        .alert-success {
            background-color: #ffe0ef;
            color: #1a1a1a; /* teks pink muda, beda dari bg */
            border-color: #f5a9c8;
        }

        /* Navbar POS - dipaksa selebar layar penuh, keluar dari padding parent-nya */
        .navbar, nav {
            background-color: #ffe0ef !important;
            border-bottom: 1px solid #f5a9c8;
            display: flex;
            align-items: center;
            width: 100vw;
            margin-left: calc(-50vw + 50%);
            margin-right: calc(-50vw + 50%);
        }
        .navbar-collapse {
            display: flex;
            align-items: center;
        }
        .navbar-nav {
            margin-left: 50px;
        }
        .navbar-nav .nav-item {
            margin-right: 20px;
        }
        .navbar a, .navbar .nav-link {
            color: #1a1a1a !important;
            padding-bottom: 4px;
            border-bottom: 2px solid transparent;
            transition: border-color 0.2s ease;
        }
        .navbar .nav-link.active {
            border-bottom: 2px solid #f472b6;
            font-weight: 600;
        }
        .navbar .nav-link:hover {
            border-bottom: 2px solid #f9a8d4;
        }
        .navbar .btn,
        .navbar button {
            flex-shrink: 0;
            margin-right: 20px;
            margin-top: 0;
            margin-bottom: 0;
        }

        /* Judul & heading */
        h1, h2, h3, h4, h5 {
            color: #1a1a1a;
        }

        /* Teks default (angka, isi tabel, dll yang tadinya hitam) jadi pink muda */
        body, p, span, div, td, th {
            color: #1a1a1a;
        }

        /* Card / kotak ringkasan - putih polos */
        .card,
        .card-header,
        .card-body {
            background: #ffffff !important;
            border: 1px solid #f5a9c8;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(244,114,182,0.2);
        }
        .card-header {
            color: #1a1a1a;
            border-bottom: 1px solid #f5a9c8;
        }

        /* Tabel (Critical Inventory Status & Best Seller Products) - putih polos */
        table,
        .table {
            background: #ffffff !important;
            border-radius: 16px;
            overflow: hidden;
            border-collapse: separate;
            border-spacing: 0;
            box-shadow: 0 8px 24px rgba(244,114,182,0.2);
            --bs-table-bg: #ffffff;
            --bs-table-color: #1a1a1a;
        }
        table th,
        table td {
            background-color: #ffffff !important;
            color: #1a1a1a !important;
            border-color: #f5a9c8 !important;
            vertical-align: middle !important;
        }

        /* wadah lain yang biasanya masih putih bawaan Bootstrap */
        .table-responsive,
        .bg-white,
        .bg-light {
            background: #ffffff !important;
            border-radius: 16px;
        }

        /* Tombol Logout & Hapus - pink muda */
        .btn-danger {
            background-color: #f9a8d4;
            color: #ffffff;
            border: 1px solid #f472b6;
        }
        .btn-danger:hover {
            background-color: #f472b6;
            color: #ffffff;
        }
        .table-responsive {
            overflow-x: auto;
        }

        /* Modal Detail Transaksi - ikut nuansa pink */
        .modal-content {
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #f5a9c8;
        }
        .modal-header {
            background-color: #ffe0ef;
            border-bottom: 1px solid #f5a9c8;
            border-radius: 16px 16px 0 0;
        }
        .modal-title {
            color: #1a1a1a;
        }
        .modal-body table {
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid px-4 px-md-5">

        @if(session('success'))
            <div class="alert alert-success">
                {{session ('success') }}
            </div>
        @endif

        @yield('content')

    </div>

</body>
</html>