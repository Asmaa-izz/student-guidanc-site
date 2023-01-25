<?php

namespace App\Http\Controllers;

use App\Models\FollowUpRecord;
use App\Models\Student;
use App\Models\VisitsRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowUpRecordsController extends Controller
{
    public function index(Student $student, Request $request)
    {
        if ($request->ajax()) {
            $search = $request->get('s');

            $records = FollowUpRecord::with('student')
                ->when($search, function ($querySearch) use ($search)  {
                    return $querySearch->where(function ($qWhere) use ($search) {
                        return $qWhere->whereHas('student', function ($q) use ($search) {
                            return $q->where('name', 'LIKE', '%' . $search . '%')->orWhere('number', 'LIKE', '%' . $search . '%');
                        })->orWhere('source_id', 'LIKE', '%' . $search . '%');
                    });
            })->get();


            return \Yajra\DataTables\DataTables::of($records)
                ->addColumn(
                    'number',
                    function (FollowUpRecord $record) {
                        return $record->student->number;
                    })
                ->addColumn(
                    'name',
                    function (FollowUpRecord $record) {
                        return '<a href="/dashboard/students/' . $record->student->id . '" class="btn btn-link">' . $record->student->name . '</a>';
                    })
                ->addColumn(
                    'created_at',
                    function (FollowUpRecord $record) {
                        return Carbon::parse($record->created_at)->format('d/m/Y');
                    })
                ->addColumn(
                    'details',
                    function (FollowUpRecord $record) {
                        return '<a href="/dashboard/students/' . $record->student->id . '/record-follow-up/' . $record->id . '" class="btn btn-primary">تفاصيل</a>';
                    })
                ->rawColumns(['number', 'name', 'created_at', 'details'])->make(true);
        } else {
            return view('dashboard.records.follow-up.index', [
                'student' => $student
            ]);
        }
    }

    public function create(Student $student)
    {
        return view('dashboard.records.follow-up.create', [
            'student' => $student
        ]);
    }

    public function store(Request $request, Student $student)
    {
        $followUpRecord = new FollowUpRecord();
        $followUpRecord->student_id = $student->id;
        $followUpRecord->status = $request->status;
        $followUpRecord->description_situation = $request->description_situation;
        $followUpRecord->handle_situation = $request->handle_situation;
        $followUpRecord->status_source = 'المدير';
        $followUpRecord->source_id = Auth::id();
        $followUpRecord->save();

        return redirect()->route('record-follow-up.index');
    }

    public function show(Student $student, FollowUpRecord $followUpRecord)
    {
        return view('dashboard.records.follow-up.show', [
            'record' => $followUpRecord,
            'student' => $student,
        ]);
    }

    public function edit(FollowUpRecord $followUpRecord)
    {
    }

    public function update(Request $request, FollowUpRecord $followUpRecord)
    {
    }

    public function destroy(FollowUpRecord $followUpRecord)
    {
    }
}
