<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SensorData;
use Carbon\Carbon;

class AqiBestWorst extends Controller
{
    public function showBestAndWorstAqi()
    {
        // Get today's date in "Y-m-d" format to filter today's records only
        $today = Carbon::today()->toDateString();

        // Fetch the best and worst AQI data for today
        $bestAqi = SensorData::whereDate('created_at', $today)
            ->orderBy('aqi', 'asc')
            ->first();

        $worstAqi = SensorData::whereDate('created_at', $today)
            ->orderBy('aqi', 'desc')
            ->first();

        // Return the response to the view or as JSON
        return view('history', compact('bestAqi', 'worstAqi'));
    }
}