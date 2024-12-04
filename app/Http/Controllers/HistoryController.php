<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData; //Pemanggilan Model yang digunakan


class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all data
        $allData = SensorData::all();

        // Group data by date and calculate the average values for each day
        $dailyData = $allData->groupBy(function ($date) {
            return \Carbon\Carbon::parse($date->created_at)->toDateString(); // Group by date
        });

        // Calculate the average AQI and other pollutants for each day
        $dailyAqi = $dailyData->map(function ($dayData) {
            return [
                'aqi' => $dayData->avg('aqi'),
                'aqi_co' => $dayData->avg('aqi_co'),
                'aqi_co2' => $dayData->avg('aqi_co2'),
                'aqi_no3' => $dayData->avg('aqi_no3'),
                'aqi_o3' => $dayData->avg('aqi_o3'),
            ];
        });

        // Extract the dates, and the averages of each pollutant for the chart
        $dates = $dailyAqi->keys();
        $averageAqi = $dailyAqi->pluck('aqi');
        $averageCO = $dailyAqi->pluck('aqi_co');
        $averageCO2 = $dailyAqi->pluck('aqi_co2');
        $averageNO3 = $dailyAqi->pluck('aqi_no3');
        $averageO3 = $dailyAqi->pluck('aqi_o3');

        // Fetch the best and worst AQI for today
        $today = \Carbon\Carbon::today()->toDateString();
        $bestAqi = SensorData::whereDate('created_at', $today)->orderBy('aqi', 'asc')->first();
        $worstAqi = SensorData::whereDate('created_at', $today)->orderBy('aqi', 'desc')->first();
        $locations = SensorData::select('sub_daerah', SensorData::raw('AVG(aqi) as average_aqi'))
            ->groupBy('sub_daerah')
            ->get();

        // Pass data to the view
        return view("history", compact(
            "dates",
            "averageAqi",
            "averageCO",
            "averageCO2",
            "averageNO3",
            "averageO3",
            "bestAqi",
            "worstAqi",
            "locations"
        ));
    }


    //AdminSide

}
