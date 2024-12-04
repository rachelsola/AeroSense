<?php
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Models\SensorData;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('index');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/education', function () {
    return view('education');
})->name('education');

// Route::get('/history', function () {
//     return view('history');
// })->name('history');
Route::get('history', [HistoryController::class, 'index'])->name('history');

Route::get('/sensor-data', function () {
    $data = SensorData::all();
    return $data;
});

Route::get('/register', [LoginController::class, 'login'])->name('register');
Route::post('registerlogin', [LoginController::class, 'registerlogin'])->name('registerlogin');

Route::post('logout', [AdminController::class, 'logout'])->name('logout');


Route::get('/admin', [AdminController::class, 'showDataAdmin'])->middleware('is_admin')->name('admin');
Route::get('/historyadmin', [AdminController::class, 'showTableAdmin'])->name('historyadmin');


Route::get('/homeadmin', function () {
    return view('admin');
})->name('homeadmin');


Route::get('/historyadmin/edit/{id}', [AdminController::class, 'edit'])->name('editSensorData');
Route::put('/historyadmin/update/{id}', [AdminController::class, 'update'])->name('updateSensorData');
Route::delete('/historyadmin/delete/{id}', [AdminController::class, 'destroy'])->name('deleteSensorData');
