<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SparePartController;
 
Route::get('/', function () {
    return view('register');
});
 
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/spare-parts/create', [SparePartController::class, 'create'])->name('spare_parts.create');
Route::post('/spare-parts', [SparePartController::class, 'store'])->name('spare_parts.store');
Route::get('/spare-parts', [SparePartController::class, 'index'])->name('spare_parts.index');
Route::get('/spare_parts/{part_id}/edit', [SparePartController::class, 'edit'])->name('spare_parts.edit');
Route::put('/spare_parts/{part_id}', [SparePartController::class, 'update'])->name('spare_parts.update');
Route::delete('/spare-parts/{id}', [SparePartController::class, 'destroy'])->name('spare_parts.destroy');
Route::get('/homep', [SparePartController::class, 'homep'])->name('homep');

