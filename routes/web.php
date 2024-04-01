<?php

use App\Http\Controllers\InfoController;

// Маршрут для получения информации о сервере
Route::get('/info/server', [InfoController::class, 'serverInfo']);

// Маршрут для получения информации о клиенте
Route::get('/info/client', [InfoController::class, 'clientInfo']);

// Маршрут для получения информации о базе данных
Route::get('/info/database', [InfoController::class, 'databaseInfo']);


Route::get('/', function () {
    return view('welcome');
});
