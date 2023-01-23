<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        return view('dashboard.students.index', [
            'students' => User::all(),
        ]);
    }

    public function create()
    {
        view('dashboard.students.create');
    }

    public function store(Request $request)
    {
        $student = new User();
        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        view('dashboard.students.show', [
            'student' => $student
        ]);
    }

    public function edit(Student $student)
    {
        view('dashboard.students.edit', [
            'student' => $student
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $student->update();

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
