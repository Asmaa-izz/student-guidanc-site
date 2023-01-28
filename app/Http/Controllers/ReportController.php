<?php

namespace App\Http\Controllers;

use App\Models\FollowUpRecord;
use App\Models\GuidanceSession;
use App\Models\Student;
use App\Models\StudentInformation;
use App\Models\VisitsRecord;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Student $student)
    {
        $studentInformation = StudentInformation::where('student_id', '=', $student->id)->first();
//        $pdf = Pdf::loadView('dashboard.report.index', [
//            'student' => $student->load('guardian'),
//            'teacher' => $studentInformation->teacher->name,
//            'mentor' => $studentInformation->mentor->name
//        ]);
//
//        return $pdf->download('report.pdf');

        return view('dashboard.report.index', [
            'student' => $student->load('guardian'),
            'teacher' => $studentInformation->teacher->name,
            'mentor' => $studentInformation->mentor->name,
            'followUpRecord' => FollowUpRecord::where('student_id', '=', $student->id)->get(),
            'visitsRecord' => VisitsRecord::where('student_id', '=', $student->id)->get(),
            'guidanceSession_lag' => GuidanceSession::where('type', '=', "تأخر دراسي")->where('student_id', '=', $student->id)->get(),
            'guidanceSession_behavior' => GuidanceSession::where('type', '=', "سلوك عدواني")->where('student_id', '=', $student->id)->get(),

        ]);

    }
}
