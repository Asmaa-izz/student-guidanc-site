<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\VisitsRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitsRecordsController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('access_visits_record');

        if ($request->ajax()) {
            $search = $request->get('s');

            $records = VisitsRecord::with('student')->whereHas('student', function ($q) use ($search) {
                return $q->when($search, function ($querySearch, $search) {
                    return $querySearch->where(function ($q) use ($search) {
                        return $q->where('name', 'LIKE', '%' . $search . '%')->orWhere('number', 'LIKE', '%' . $search . '%');
                    });
                });
            })->get();

            return \Yajra\DataTables\DataTables::of($records)
                ->addColumn(
                    'number',
                    function (VisitsRecord $record) {
                        return $record->student->number;
                    })
                ->addColumn(
                    'name',
                    function (VisitsRecord $record) {
                        return '<a href="/dashboard/students/' . $record->student->id . '" class="btn btn-link">' . $record->student->name . '</a>';
                    })
                ->addColumn(
                    'created_at',
                    function (VisitsRecord $record) {
                        return Carbon::parse($record->created_at)->format('d/m/Y');
                    })
                ->addColumn(
                    'details',
                    function (VisitsRecord $record) {
                        return '<a href="/dashboard/students/'.$record->student->id.'/record-visits/' . $record->id . '" class="btn btn-primary">تفاصيل</a>';
                    })
                ->rawColumns(['number','name','created_at', 'details'])->make(true);
        } else {
            return view('dashboard.records.visits.index');
        }

    }

    public function create(Student $student)
    {
        $this->authorize('create_visits_record');

        return view('dashboard.records.visits.create', [
            'student' => $student->load('guardian')
        ]);
    }

    public function store(Request $request, Student $student)
    {
        $this->authorize('create_visits_record');

        $visitsRecord = new VisitsRecord();
        $visitsRecord->student_id = $student->id;
        $visitsRecord->guardian_name = $request->name;
        $visitsRecord->guardian_attribute = $request->attribute;
        $visitsRecord->phone = $request->phone;
        $visitsRecord->notes = $request->notes;
        $visitsRecord->save();

        return redirect()->route('record-visits.index');
    }

    public function show(Student $student, VisitsRecord $visitsRecord)
    {
        $this->authorize('access_visits_record');

        return view('dashboard.records.visits.show', [
            'record' => $visitsRecord,
            'student' => $student,
        ]);
    }

    public function edit(VisitsRecord $visitsRecord)
    {
    }

    public function update(Request $request, VisitsRecord $visitsRecord)
    {
    }

    public function destroy(VisitsRecord $visitsRecord)
    {
    }
}
