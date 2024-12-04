<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aerosense</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('../css/edit.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>
    </style>
</head>

<body>
    <div class="editData">
        <h1>Edit Sensor Data</h1>
        <form action="{{ route('updateSensorData', $sensorData->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="aqi_co">CO:</label>
            <input type="text" name="aqi_co" id="aqi_co" value="{{ $sensorData->aqi_co }}" required><br>

            <label for="aqi_co2">CO2:</label>
            <input type="text" name="aqi_co2" id="aqi_co2" value="{{ $sensorData->aqi_co2 }}" required><br>

            <label for="aqi_o3">O3:</label>
            <input type="text" name="aqi_o3" id="aqi_o3" value="{{ $sensorData->aqi_o3 }}" required><br>

            <label for="aqi_no3">NO3:</label>
            <input type="text" name="aqi_no3" id="aqi_no3" value="{{ $sensorData->aqi_no3 }}" required><br>

            <label for="aqi">AQI:</label>
            <input type="text" name="aqi" id="aqi" value="{{ $sensorData->aqi }}" required><br>

            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>

</html>