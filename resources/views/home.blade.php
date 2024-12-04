<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aerosense</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('../css/home.css') }}" rel="stylesheet">
    <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


    <link rel="stylesheet" href="assets/js/Leaflet.Markercluster-master/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="assets/js/Leaflet.Markercluster-master/dist/MarkerCluster.Default.css" />
    <script src="assets/js/Leaflet.Markercluster-master/dist/leaflet.markercluster-src.js"></script>
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
        <div class="content">
            <div class="content-description">
                <h1 class="title">Website Pemantauan</h1>
                <h2 class="title">Kualitas Udara</h2>
                <p>UNIVERSITAS DIPONEGORO</p>
            </div>
            <div class="content-image">
                <img src="{{ asset('/assets/weather.png')}}" alt="AeroSense" />
            </div>
        </div>

        <div class="main_content">
            <div class="map">
                <div id="map" style="width: 900px; height: 325px; border-radius: 1rem;"></div>
                <script src="{{ asset('assets/js/leaflet.ajax.js') }}"></script>
                <script type="text/javascript">
                    const Mymap = L.map("map").setView(
                        {!! json_encode($mapConfig['center']) !!},
                        {{ $mapConfig['zoom'] }}
                    );

                    const tiles = L.tileLayer(
                        "{{ $mapConfig['tileLayer']['url'] }}",
                        {
                            maxZoom: {{ $mapConfig['tileLayer']['options']['maxZoom'] }},
                            attribution: "{{ $mapConfig['tileLayer']['options']['attribution'] }}",
                        }
                    ).addTo(Mymap);

                    var Mystyle = {!! json_encode($mapConfig['style']) !!};

                    // Fungsi PopUp untuk menampilkan informasi AQI pada popup
                    function popUp(f, l) {
                        var out = [];
                        if (f.properties) {
                            for (var key in f.properties) {
                                out.push(key + ": " + f.properties[key]);
                            }
                            l.bindPopup(out.join("<br />"));
                        }
                    }
                    var markers = L.markerClusterGroup();
                    var myIcon = L.Icon.extend({
                        options: {
                            iconSize: [38, 45]
                        }
                    });
                    // Menambahkan marker untuk setiap data AQI dari sensorData
                    @foreach ($sensorData as $data)
                        // Membuat marker di lokasi (latitude, longitude)
                        var marker = L.marker([{{ $data->latitude }}, {{ $data->longitude }}]);

                        // Menambahkan popup yang menampilkan AQI dan lokasi sensor
                        marker.bindPopup("<b>AQI: {{ $data->aqi }}</b><br><b>Lokasi: </b>{{ $data->Nama }}");

                        // Menambahkan marker ke layer markers
                        markers.addLayer(marker);
                    @endforeach
                    Mymap.addLayer(markers);
                </script>
            </div>

            <!-- Indikator kualitas udara -->
            <div class="indicator">
                <div class="indicator_subtitle">
                    <h1>KUALITAS UDARA DI SEKITAR</h1>
                    <h2>UNIVERSITAS DIPONEGORO</h2>
                </div>
                <div class="indicator_score">
                    <h1>
                        @if($averageAqi)
                            {{ number_format($averageAqi->avg_aqi, 2) }}
                        @else
                            Data AQI tidak tersedia
                        @endif
                    </h1>
                </div>

                <div class="indicator_status">
                    <h2 class="{{ strtolower(str_replace(' ', '_', $status)) }}">
                        @if($averageAqi)
                            {{ $status }}
                        @else
                            Data AQI tidak tersedia
                        @endif
                    </h2>
                </div>
            </div>

            <div class="main_education">
                <h1>Mengapa kualitas udara yang baik itu penting?</h1>
                <p>Udara bersih sangat penting untuk kesehatan, mencegah masalah seperti asma, penyakit paru-paru, dan
                    gangguan jantung. Udara yang baik juga mendukung lingkungan, membantu tumbuhan dan hewan tumbuh
                    dengan baik, serta mengurangi polusi dan dampak perubahan iklim. Dengan kualitas udara yang baik,
                    kita dapat hidup lebih sehat, nyaman, dan menjaga keseimbangan alam untuk generasi mendatang.</p>
                <a href="{{ route('education') }}">Education</a>
            </div>
            <div class="indicator_info">
                <h1>AQI LEVELS</h1>
                <img src="{{ asset('/assets/AQLevels.jpg')}}" alt="AQ Levels" />
            </div>
        </div>

        <div class="last_content">
            <h1>Grafik Pemantauan Kualitas Udara</h1>
            <a href="{{ route('history') }}">History</a>
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