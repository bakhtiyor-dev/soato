<?php

namespace App\Http\Controllers;

use App\Imports\SoatoImport;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class InstallController extends Controller
{
    public function index()
    {
        if (!Schema::hasTable('students')) {
            return view('install');
        }
        return redirect()->route('students.index');
    }

    public function install()
    {
        Artisan::call('migrate');
        Excel::import(new SoatoImport(), 'import.xlsx');
        return back();
    }
}
