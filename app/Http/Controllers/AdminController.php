<?php


namespace App\Http\Controllers;


use App\Models\SensorData;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function showAdmin()
    {
        return view('admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('register');
    }

    public function editData()
    {

    }

    //shoDataToAdmin
    public function showDataAdmin()
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


        $today = \Carbon\Carbon::today()->toDateString();
        $locations = SensorData::select('sub_daerah', SensorData::raw('AVG(aqi) as average_aqi'))
            ->groupBy('sub_daerah')
            ->get();

        // Pass data to the view
        return view("admin", compact(
            "dates",
            "averageAqi",
            "averageCO",
            "averageCO2",
            "averageNO3",
            "averageO3",
            "locations"
        ));
    }

    //Table
    public function showTableAdmin()
    {
        //Menampilkan Data
        $allData = SensorData::all();
        $aqi = $allData->pluck("aqi");
        $averageCO = $allData->pluck('aqi_co')->avg();
        $averageCO2 = $allData->pluck('aqi_co2')->avg();
        $averageNO3 = $allData->pluck('aqi_no3')->avg();
        $averageO3 = $allData->pluck('aqi_o3')->avg();
        $topTimeStamp = $allData->pluck('created_at');
        return view("historyAdmin", compact("allData", "averageCO", "averageCO2", "averageNO3", "averageO3", "aqi"));

    }

    public function edit($id)
    {
        $sensorData = SensorData::findOrFail($id);
        return view('edit', compact('sensorData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'aqi_co' => 'required|numeric',
            'aqi_co2' => 'required|numeric',
            'aqi_o3' => 'required|numeric',
            'aqi_no3' => 'required|numeric',
            'aqi' => 'required|numeric',
        ]);

        $sensorData = SensorData::findOrFail($id);

        // Perbarui kolom secara manual tanpa kolom timestamps
        $sensorData->update([
            'aqi_co' => $request->aqi_co,
            'aqi_co2' => $request->aqi_co2,
            'aqi_o3' => $request->aqi_o3,
            'aqi_no3' => $request->aqi_no3,
            'aqi' => $request->aqi,
        ]);

        return redirect()->route('admin')->with('success', 'Sensor data updated successfully!');
    }


    public function destroy($id)
    {
        $sensorData = SensorData::findOrFail($id);
        $sensorData->delete();

        return redirect()->route('admin')->with('success', 'Sensor data deleted successfully!');
    }
}
