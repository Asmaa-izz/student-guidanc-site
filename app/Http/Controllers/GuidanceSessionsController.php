<?php

namespace App\Http\Controllers;

use App\Models\FollowUpRecord;
use App\Models\GuidanceSession;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuidanceSessionsController extends Controller
{
    public function index(Student $student, Request $request)
    {
        if ($request->ajax()) {
            $search = $request->get('s');

            $records = GuidanceSession::with('student')
                ->when($search, function ($querySearch) use ($search)  {
                    return $querySearch->where(function ($qWhere) use ($search) {
                        return $qWhere->whereHas('student', function ($q) use ($search) {
                            return $q->where('name', 'LIKE', '%' . $search . '%')->orWhere('number', 'LIKE', '%' . $search . '%');
                        })->orWhere('time', 'LIKE', '%' . $search . '%');
                    });
                })->get();


            return \Yajra\DataTables\DataTables::of($records)
                ->addColumn(
                    'number',
                    function (GuidanceSession $record) {
                        return $record->student->number;
                    })
                ->addColumn(
                    'name',
                    function (GuidanceSession $record) {
                        return '<a href="/dashboard/students/' . $record->student->id . '" class="btn btn-link">' . $record->student->name . '</a>';
                    })
                ->addColumn(
                    'time',
                    function (GuidanceSession $record) {
                        return Carbon::parse($record->time)->format('d/m/Y');
                    })
                ->addColumn(
                    'details',
                    function (GuidanceSession $record) {
                        return '<a href="/dashboard/students/' . $record->student->id . '/guidance-sessions/' . $record->id . '" class="btn btn-primary">تفاصيل</a>';
                    })
                ->rawColumns(['number', 'name', 'type', 'time', 'details'])->make(true);
        } else {
            return view('dashboard.records.guidance-session.index', [
                'student' => $student
            ]);
        }
    }

    public function create(Student $student)
    {
        return view('dashboard.records.guidance-session.create', [
            'student' => $student
        ]);
    }

    public function store(Request $request, Student $student)
    {
        $guidanceSession = new GuidanceSession();
        $guidanceSession->student_id = $student->id;
        $guidanceSession->type = $request->type;
        $guidanceSession->place = $request->place;
        $guidanceSession->description = $request->description;
        $guidanceSession->time = $request->time;

        $guidanceSession->save();

        return redirect()->route('guidance-sessions.index');
    }

    public function show(Student $student, GuidanceSession $guidanceSession)
    {
        return view('dashboard.records.guidance-session.show', [
            'session' => $guidanceSession,
            'student' => $student,
        ]);
    }

    public function edit(GuidanceSession $guidanceSession)
    {
    }

    public function update(Request $request, GuidanceSession $guidanceSession)
    {
    }

    public function destroy(GuidanceSession $guidanceSession)
    {
    }
}
