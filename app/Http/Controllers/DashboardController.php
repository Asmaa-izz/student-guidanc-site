<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
           'teacher_count' => User::whereHas('roles', function ($query) {
               return $query->where('name', '=', 'teacher');
           })->count(),
           'mentor_count' => User::whereHas('roles', function ($query) {
               return $query->where('name', '=', 'mentor');
           })->count(),
           'student_count' => Student::all()->count(),
        ]);
    }
}
