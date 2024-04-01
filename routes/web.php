<?php

use App\Http\Controllers\InfoController;
use App\Http\Controllers\AuthController;




Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);




// Маршрут для получения информации о сервере
Route::get('/info/server', [InfoController::class, 'serverInfo']);

// Маршрут для получения информации о клиенте
Route::get('/info/client', [InfoController::class, 'clientInfo']);

// Маршрут для получения информации о базе данных
Route::get('/info/database', [InfoController::class, 'databaseInfo']);


Route::get('/', function () {
    return view('welcome');
});
