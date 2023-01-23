<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        return view('dashboard.teachers.index', [
            'teachers' => User::all(),
        ]);
    }

    public function create()
    {
        view('dashboard.teachers.create');
    }

    public function store(Request $request)
    {
        $teacher = new User();
        return redirect()->route('teachers.index');
    }

    public function show(teacher $teacher)
    {
        view('dashboard.teachers.show', [
            'teacher' => $teacher
        ]);
    }

    public function edit(teacher $teacher)
    {
        view('dashboard.teachers.edit', [
            'teacher' => $teacher
        ]);
    }

    public function update(Request $request, teacher $teacher)
    {
        $teacher->update();

        return redirect()->route('teachers.index');
    }

    public function destroy(teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index');
    }
}
