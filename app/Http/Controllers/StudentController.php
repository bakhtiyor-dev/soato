<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::query()->paginate(20);

        return view('welcome', compact('students'));
    }

    public function create()
    {
        return view('create', [
            'regions' => Region::all()
        ]);
    }

    public function store(Request $request)
    {
        Student::query()->create($request->all());

        return redirect()->route('students.index');
    }

}
