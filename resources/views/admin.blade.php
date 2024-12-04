<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aerosense</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('../css/admin.css') }}" rel="stylesheet">
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
                <li><a href="{{ route('historyadmin') }}">History</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Halaman Controlling Admin</h1>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="btn-logout">Logout</button>
        </form>

        <div class="main">
            <div class="card">
                <div class="aqiData">
                    <h1>Daftar Riwayat Kualitas Udara Universitas Diponegoro</h1>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <section>
                <div class="card">
                    <div class="historyData">
                        <h1>Presentase Kandungan Kadar Kualiatas Udara</h1>
                        <canvas id="piechart"></canvas>
                    </div>
                </div>
                <div class="card">
                    <div class="card">
                        <div class="historyCo">
                            <h1>Daftar Kualitas Udara Perlokasi</h1>
                            <canvas id="acquisitions"></canvas>
                        </div>
                    </div>
            </section>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const barCtx = document.getElementById('myChart').getContext('2d');
            new Chart(barCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($dates->toArray()) !!}, // Convert Collection to array and encode as JSON
                    datasets: [{
                        label: 'Rata-rata AQI Per Hari',
                        data: {!! json_encode($averageAqi->toArray()) !!}, // Convert Collection to array and encode as JSON
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Pie Chart (Doughnut Chart) for average pollutant values
            const pieCtx = document.getElementById('piechart').getContext('2d');
            new Chart(pieCtx, {
                type: 'doughnut',
                data: {
                    labels: ['CO', 'CO2', 'NO3', 'O3'],
                    datasets: [{
                        label: '# of Votes',
                        data: [
                            {!! json_encode($averageCO->last()) !!},
                            {!! json_encode($averageCO2->last()) !!},
                            {!! json_encode($averageNO3->last()) !!},
                            {!! json_encode($averageO3->last()) !!}
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Bar Chart for AQI per Location
            const locations = {!! json_encode($locations) !!}; // Data for locations
            const data = locations.map(location => ({
                year: location.sub_daerah,  // Use sub_daerah as label
                count: location.average_aqi  // Average AQI for the location
            }));

            // Konfigurasi untuk Bar Chart
            const config = {
                type: 'bar',
                data: {
                    labels: data.map(row => row.year),  // Use sub_daerah as labels
                    datasets: [{
                        label: 'AQI per Lokasi',
                        data: data.map(row => row.count),  // Average AQI per location
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top', // Posisi legend di bagian atas
                        }
                    }
                }
            };

            // Inisialisasi Chart dengan konfigurasi yang baru
            new Chart(document.getElementById('acquisitions'), config);

        </script>
    </main>

    <footer>
        <img src="{{ asset('/assets/logo_removed.png')}}" alt="AeroSense" />
    </footer>
</body>

</html>