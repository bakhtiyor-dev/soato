<?php

use App\Http\Controllers\InstallController;
use App\Http\Controllers\StudentController;
use App\Models\District;
use App\Models\Region;
use Illuminate\Support\Facades\Route;

Route::get('/install', [InstallController::class, 'install'])->name('install');
Route::get('/', [InstallController::class, 'index']);

Route::resource('students', StudentController::class)->only(['index', 'create', 'store']);

Route::get(
    '/api/regions/{code}/districts',
    fn($code) => Region::query()->where('code', $code)->first()->districts->toJson()
);

Route::get(
    '/api/districts/{code}/towns',
    fn($code) => District::query()->where('code', $code)->first()->towns->toJson()
);