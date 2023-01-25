<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('access_record');

        if ($request->ajax()) {
            $search = $request->get('s');

            $students = Student::with('guardian')->when($search, function ($querySearch, $search) {
                $querySearch->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%')->orWhere('number', 'LIKE', '%' . $search . '%');
                });
            })->get();

            return \Yajra\DataTables\DataTables::of($students)
                ->addColumn(
                    'name',
                    function (Student $student) {
                        return '<a href="/dashboard/students/' . $student->id . '" class="btn btn-link">' . $student->name . '</a>';
                    })
                ->addColumn(
                    'guardian_name',
                    function (Student $student) {
                        return $student->guardian->name;
                    })
                ->addColumn(
                    'phone',
                    function (Student $student) {
                        return $student->guardian->phone;
                    })
                ->addColumn(
                    'attribute',
                    function (Student $student) {
                        return $student->guardian->attribute;
                    })
                ->addColumn(
                    'record',
                    function (Student $student) {
                        if($student) {
                            return '<a href="/dashboard/students/' . $student->id . '/record" class="btn btn-primary">اضافة</a>';
                        }else {
                            return '<a href="/dashboard/students/' . $student->id . '/record" class="btn btn-success">اظهار</a>';
                        }

                    })
                ->rawColumns(['number','name','guardian_name', 'phone', 'attribute',  'record'])->make(true);
        } else {
            return view('dashboard.records.index');
        }

    }
}
