<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aerosense</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('../css/historyadmin.css') }}" rel="stylesheet">
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
                <li><a href="{{ route('admin') }}">Home</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="table-responsive">
            <table border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>CO</th>
                        <th>CO2</th>
                        <th>O3</th>
                        <th>NO3</th>
                        <th>AQI</th>
                        <th>Timestamp</th>
                        <th>Longitude</th>
                        <th>Latitude</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allData as $index => $data)
                        <tr>
                            <td data-label="No">{{ $index + 1 }}</td>
                            <td data-label="CO">{{ $data->aqi_co }}</td>
                            <td data-label="CO2">{{ $data->aqi_co2 }}</td>
                            <td data-label="O3">{{ $data->aqi_o3 }}</td>
                            <td data-label="NO3">{{ $data->aqi_no3 }}</td>
                            <td data-label="AQI">{{ $data->aqi }}</td>
                            <td data-label="TimeStamp">{{ $data->longitude }}</td>
                            <td data-label="Longitude">{{ $data->latitude }}</td>
                            <td data-label="Latitude">{{ $data->created_at }}</td>
                            <td data-label="Action">
                                <a href="{{ route('editSensorData', $data->id) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('deleteSensorData', $data->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <img src="{{ asset('/assets/logo_removed.png')}}" alt="AeroSense" />
    </footer>
</body>

</html>