<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;

class HomeController extends Controller
{
    public function index()
    {
        // Konfigurasi map
        $mapConfig = [
            'center' => [-7.052739487304246, 110.43984169151122],
            'zoom' => 16,
            'tileLayer' => [
                'url' => 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
                'options' => [
                    'maxZoom' => 19,
                    'attribution' => '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                ]
            ],
            'style' => [
                'color' => '#ff7800',
                'weight' => 5,
                'opacity' => 0.5,
            ]
        ];

        // Mengambil data AQI dari database
        $sensorData = SensorData::select('latitude', 'longitude', 'aqi') // Asumsi ada kolom latitude, longitude di tabel SensorData
            ->whereNotNull('latitude') // pastikan ada data lokasi
            ->whereNotNull('longitude')
            ->get();

        // Menambahkan logika untuk menghitung rata-rata AQI per hari
        $averageAqi = SensorData::selectRaw('AVG(aqi) as avg_aqi, DATE(created_at) as date')
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->groupBy('date')
            ->orderBy('date', 'desc') // Urutkan berdasarkan tanggal terbaru
            ->first(); // Ambil rata-rata AQI terbaru

        // Tentukan status kualitas udara berdasarkan AQI
        if ($averageAqi && $averageAqi->avg_aqi <= 50) {
            $status = "GOOD";
        } elseif ($averageAqi && $averageAqi->avg_aqi <= 100) {
            $status = "MODERATE";
        } elseif ($averageAqi && $averageAqi->avg_aqi <= 200) {
            $status = "UNHEALTHY";
        } elseif ($averageAqi && $averageAqi->avg_aqi <= 300) {
            $status = "VERY UNHEALTHY";
        } else {
            $status = "HAZARDOUS";
        }

        return view('home', compact('mapConfig', 'sensorData', 'averageAqi', 'status'));
    }

}