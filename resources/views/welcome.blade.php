<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'PerpusDigital') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700,800,900&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Figtree', sans-serif;
            overflow: hidden;
        }

        /* Full Background Image dengan Overlay Gelap */
        .hero-wrapper {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('https://png.pngtree.com/background/20250104/original/pngtree-cartoon-library-interior-with-bookshelves-and-open-book-on-table-picture-image_15776753.jpg');
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            flex-direction: column;
            color: white;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            padding: 0 20px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 0;
        }

        .logo {
            font-size: 26px;
            font-weight: 900;
            letter-spacing: -1px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            margin-left: 20px;
            padding: 8px 16px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .hero-body {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .hero-text {
            max-width: 800px;
        }

        /* Label Selamat Datang Ungu */
        .welcome-label {
            display: block;
            font-size: 1.5rem;
            font-weight: 800;
            color: #a855f7; /* Ungu Cerah */
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-text h1 {
            font-size: 4.5rem;
            font-weight: 900;
            line-height: 1.1;
            margin-top: 0;
            margin-bottom: 20px;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .hero-text p {
            font-size: 1.3rem;
            margin-bottom: 40px;
            opacity: 0.9;
            line-height: 1.6;
            max-width: 600px;
        }

        .btn-group {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 16px 32px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 800;
            transition: 0.3s;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            color: white;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(99, 102, 241, 0.5);
        }

        .btn-outline {
            border: 2px solid white;
            color: white;
            backdrop-filter: blur(5px);
        }

        .btn-outline:hover {
            background: white;
            color: #1f2937;
        }
    </style>
</head>

<body>
    <div class="hero-wrapper">
        <div class="container">
            <nav>
                <div class="logo">PerpusDigital</div>
                <div class="nav-links">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" style="background: white; color: #4f46e5;">Daftar</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>

            <div class="hero-body">
                <div class="hero-text">
                    <span class="welcome-label">Selamat Datang</span>
                    
                    <h1>Pengetahuan Tak Terbatas <br>Ada di Sini</h1>
                    
                    <p>Jelajahi koleksi buku digital terlengkap dan kembangkan wawasanmu tanpa batas bersama sistem perpustakaan modern kami.</p>

                    <div class="btn-group">
                        <a href="{{ route('login') }}" class="btn btn-primary">MULAI MEMBACA</a>
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-outline">LIHAT KOLEKSI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>