<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aerosense</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('../css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>
    </style>
</head>

<body>
    <header class="navbar-container">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('/assets/logo_removed.png')}}" alt="AeroSense" />
            </a>
        </div>
        <nav class="nav-list">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('history') }}">History</a></li>
                <li><a href="{{ route('education') }}">Education</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="content">
            <div class="content-description">
                <h1 class="title">AeroSense</h1>
                <p>
                    Saat ini, kualitas udara semakin hari semakin memburuk seiring berjalannya waktu.
                    Belum banyak masyarakat yang menyadari betapa pentingnya kualitas udara tesebut di dalam kehidupan
                    sehari hari.
                    Untuk itu, AeroSense hadir sebagai wadah bagi masyarakat Universitas Diponegoro untuk mengetahui
                    kadar kualitas udara
                    di sekitar lingkungan Universitas Diponegoro dan dapat mengambil tindakan preventif ketika
                    kualitas udara tersebut memburuk.
                </p>
                <a href="{{ route('home') }}">Home</a>

            </div>
            <div class="content-image">
                <img src="{{ asset('/assets/weather.png')}}" alt="AeroSense" />
            </div>
        </div>
    </main>

</html>