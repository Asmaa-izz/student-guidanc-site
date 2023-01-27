<?php

namespace App\Http\Controllers;

use App\Models\FollowUpRecord;
use App\Models\GuidanceSession;
use App\Models\Student;
use App\Models\User;
use App\Models\VisitsRecord;

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
            'visitsRecord_count' => VisitsRecord::all()->count(),
            'followUpRecord_count' => FollowUpRecord::all()->count(),
            'guidanceSession_lag_count' => GuidanceSession::where('type', '=', "تأخر دراسي")->count(),
            'guidanceSession_behavior_count' => GuidanceSession::where('type', '=', "سلوك عدواني")->count(),

            'student_lag_count' => GuidanceSession::where('type', '=', "تأخر دراسي")->groupBy('student_id')->count(),
            'student__behavior_count' => GuidanceSession::where('type', '=', "سلوك عدواني")->groupBy('student_id')->count(),
        ]);
    }
}
