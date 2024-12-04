<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aerosense</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('../css/education.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>
    </style>
</head>

<body>
    <header class="navbar-container">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('/assets/logo_removed.png') }}" alt="AeroSense" />
            </a>
        </div>
        <div class="menu-toggle" id="menu-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <nav class="nav-list" id="nav-list">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('history') }}">History</a></li>
                <li><a href="{{ route('education') }}">Education</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="information">
            <div class="info_one">
                <h1>Kenapa kualitas udara yang baik itu penting?</h1>
                <p>Kualitas udara yang baik penting karena berpengaruh pada kesehatan manusia, kelestarian lingkungan,
                    ekonomi, dan perubahan iklim global. Ini memainkan peran kunci dalam mencegah penyakit pernapasan,
                    menjaga ekosistem yang seimbang, meningkatkan kualitas hidup, dan mengurangi biaya perawatan
                    kesehatan. Selain itu, juga membantu dalam mengurangi emisi gas rumah kaca dan mengatasi perubahan
                    iklim. Dengan demikian, menjaga udara tetap bersih adalah investasi penting untuk masa depan yang
                    lebih baik.</p>
            </div>
            <div class="info_two">
                <h1>Dampak negatif dari kualitas udara yang buruk</h1>
                <img src="{{ asset('/assets/AirPolution.jpg')}}" alt="AirPolution" />
                <h2>Menyebabkan Gangguan Kesehatan</h2>
                <p>Menurut WHO kualitas udara yang buruk dapat menyebabkan peningkatan risiko penyakit pernapasan,
                    gangguan kardiovaskular, dan masalah kesehatan lainnya.</p>
                <h2>Timbulnya Kerusakan pada Lingkungan</h2>
                <p>Pencemaran udara dapat merusak lingkungan dengan mempengaruhi pertumbuhan tanaman, mengurangi
                    produktivitas pertanian, dan merusak ekosistem air.</p>
                <h2>Perubahan Iklim</h2>
                <p>Gas-gas rumah kaca yang dilepaskan oleh polusi udara dapat menyebabkan pemanasan global dan perubahan
                    iklim, dengan dampak seperti peningkatan suhu global, perubahan pola cuaca, dan kenaikan permukaan
                    air laut.</p>
            </div>
            <div class="news_one">
                <div class="header_one">
                    <img src="{{ asset('/assets/detik.png')}}" alt="DetikNews" />
                    <div class="headerone_text">
                        <p>detikNews</p>
                        <p>https://news.detik.com </p>
                    </div>
                </div>
                <h1><a href="https://shorturl.at/nBCNT" target="_blank">Kualitas Udara Semarang Zona Oranye, Dinkes
                        Minta Kelompok Rentan Bermasker</a></h1>
                <p>Polusi udara di Kota Semarang rata-rata berada dalam kategori kuning hingga oranye berapa hari
                    terakhir. Masyarakat yang masuk kelompok...</p>
            </div>
            <div class="news_two">
                <div class="header_two">
                    <img src="{{ asset('/assets/detik.png')}}" alt="DetikNews" />
                    <div class="headertwo_text">
                        <p>detikNews</p>
                        <p>https://news.detik.com </p>
                    </div>
                </div>
                <h1><a href="https://shorturl.at/wzFU9" target="_blank">Pakar Ungkap Dampak dari Kualitas Udara yang
                        Buruk, Bahaya untuk Anak Kecil-Lansia</a></h1>
                <p>Kualitas udara yang buruk dapat disebabkan oleh "iritasi" di udara di mana partikel atau zat di udara
                    yang berbahaya bagi seseorang untuk dihirup...</p>
            </div>
            <div class="news_three">
                <div class="header_three">
                    <img src="{{ asset('/assets/detik.png')}}" alt="DetikNews" />
                    <div class="headerthree_text">
                        <p>detikNews</p>
                        <p>https://news.detik.com </p>
                    </div>
                </div>
                <h1><a href="https://shorturl.at/muBGQ" target="_blank">10 Cara Mengatasi Pencemaran Udara dan
                        Pencegahannya</a></h1>
                <p>Pencemaran udara bukanlah masalah yang mudah untuk diatasi. Namun, Anda bisa berkontribusi dalam
                    mengatasi pencemaran udara dengan cara ini...</p>
            </div>
            <div class="news_four">
                <div class="header_four">
                    <img src="{{ asset('/assets/AyoSehat.png')}}" alt="Ayo Sehat" />
                    <div class="headerfour_text">
                        <p>Ayo Sehat</p>
                        <p>https://ayosehat.kemkes.go.id</p>
                    </div>
                </div>
                <h1><a href="https://ayosehat.kemkes.go.id/atasi-dampak-polusi-mulai-dari-kita" target="_blank">Atasi
                        Dampak Polusi Mulai dari Kita</a></h1>
                <p>Pencemaran udara bukanlah masalah yang mudah untuk diatasi. Namun, Anda bisa berkontribusi dalam
                    mengatasi pencemaran udara dengan cara ini...</p>
            </div>
            <div class="news_five">
                <div class="header_five">
                    <img src="{{ asset('/assets/detik.png')}}" alt="Detik" />
                    <div class="headerfive_text">
                        <p>detikNews</p>
                        <p>https://news.detik.com</p>
                    </div>
                </div>
                <h1><a href="https://news.detik.com/berita/d-6700309/indeks-kualitas-udara-pengertian-manfaat-dan-kategorinya"
                        target="_blank">Indeks Kualitas Udara: Pengertian, Manfaat, dan Kategorinya</a></h1>
                </a></h1>
                <p>Dilansir situs Dinas Lingkungan Hidup dan Kehutanan Provinsi Banten, indeks kualitas udara adalah
                    alat ukur sederhana berupa angka untuk menginformasikan kualitas udara ambien suatu daerah. Indeks
                    kualitas udara diperoleh dari pengolahan data hasil pemantauan kualitas udara
                    tahunan.
                </p>
            </div>
            <div class="info_three">
                <h1>Sumber polusi pada udara</h1>
                <p>Sumber-sumber utama polusi udara meliputi emisi dari kendaraan bermotor, industri, pembangkit
                    listrik, pembakaran biomassa, pembakaran sampah, dan perkembangan urbanisasi. Di banyak wilayah,
                    sumber polusi udara terbesar adalah kendaraan bermotor. Kendaraan bermotor menghasilkan gas buang
                    yang mencakup berbagai zat berbahaya seperti CO, NO, dan partikel halus. </p>
            </div>
        </div>
    </main>

    <footer>
        <img src="{{ asset('/assets/logo_removed.png')}}" alt="AeroSense" />
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.getElementById('menu-toggle');
            const navList = document.getElementById('nav-list');

            if (menuToggle && navList) {
                menuToggle.addEventListener('click', function () {
                    navList.classList.toggle('active'); // Menambahkan atau menghapus class 'active'
                });
            }
        });
    </script>
</body>

</html>