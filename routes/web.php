<?php

use Illuminate\Support\Facades\Route;


Route::redirect('/', '/students');

Route::resource('students', \App\Http\Controllers\StudentController::class)->only(['index', 'create', 'store']);

Route::get('/api/regions/{code}/districts', function ($code) {
    return \App\Models\Region::query()->where('code', $code)->first()->districts->toJson();
});

Route::get('/api/districts/{code}/towns', function ($code) {
    return \App\Models\District::query()->where('code', $code)->first()->towns->toJson();
});