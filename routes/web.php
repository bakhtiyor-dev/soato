<?php

use App\Http\Controllers\InstallController;
use App\Imports\SoatoImport;
use App\Models\District;
use App\Models\Region;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/test', function () {
    Artisan::call('db:wipe');
});

Route::get('/install', [InstallController::class, 'install'])->name('install');

Route::get('/', InstallController::class);

Route::resource('students', \App\Http\Controllers\StudentController::class)->only(['index', 'create', 'store']);

Route::get(
    '/api/regions/{code}/districts',
    fn($code) => Region::query()->where('code', $code)->first()->districts->toJson()
);

Route::get(
    '/api/districts/{code}/towns',
    fn($code) => District::query()->where('code', $code)->first()->towns->toJson()
);