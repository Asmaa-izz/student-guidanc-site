<?php

namespace App\Http\Controllers;

use App\Models\FollowUpRecord;
use App\Models\Guardian;
use App\Models\GuidanceSession;
use App\Models\Student;
use App\Models\StudentInformation;
use App\Models\User;
use App\Models\VisitsRecord;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('access_student');
        if ($request->ajax()) {
            $search = $request->get('s');

            $students = Student::when($search, function ($querySearch, $search) {
                $querySearch->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('number', 'LIKE', '%' . $search . '%');
                });
            })->get();

            return \Yajra\DataTables\DataTables::of($students)
                ->addColumn(
                    'name',
                    function (Student $student) {
                        return '<a href="/dashboard/students/' . $student->id . '" class="btn btn-link">' . $student->name . '</a>';
                    })
                ->addColumn(
                    'record',
                    function (Student $student) {
                        return '<a href="/dashboard/students/' . $student->id . '/record-visits/create" class="btn btn-outline-primary">اضافة زيارة أولياء أمور</a>
                                <a href="/dashboard/students/' . $student->id . '/record-follow-up/create" class="btn btn-outline-primary">اضافة متابعة المواقف اليومية</a>
                                <a href="/dashboard/students/' . $student->id . '/guidance-sessions/create" class="btn btn-outline-primary">اضافة جلسة ارشاد</a>
                                ';
                    })
                ->addColumn(
                    'action',
                    function (Student $student) {
                        return '<a href="/dashboard/students/' . $student->id . '/edit" class="btn btn-primary">تعديل </a>
                                <button type="button" onClick="deleteProduct(' . $student->id . ')" class="btn btn-danger">
                                حذف
                                </button>';
                    })
                ->addColumn(
                    'report',
                    function (Student $student) {
                        return '<a href="/dashboard/students/' . $student->id . '/report" class="btn btn-info">تقرير </a>';
                    })
                ->rawColumns(['number', 'name', 'record', 'action', 'report'])->make(true);
        } else {
            return view('dashboard.students.index');
        }
    }

    public function create()
    {
        $this->authorize('create_student');
        return view('dashboard.students.create', [
            'teachers' => User::whereHas('roles', function ($query) {
                            return $query->where('name', '=', 'teacher');
                        })->get(),
            'mentors' => User::whereHas('roles', function ($query) {
                            return $query->where('name', '=', 'mentor');
                        })->get(),
            'number' => random_int(100000, 999999),
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create_student');

        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'guardian_email' => 'required',
            'guardian_phone' => 'required',
            'class' => 'required',
            'teacher' => 'required',
            'mentor' => 'required',
        ]);

        $guardian = new Guardian();
        $guardian->email = $request->guardian_email;
        $guardian->name = $request->guardian_name;
        $guardian->phone = $request->guardian_phone;
        $guardian->attribute = $request->guardian_attribute;
        $guardian->save();

        $student = new Student();
        $student->guardian_id = $guardian->id;
        $student->name = $request->name;
        $student->number = $request->number;
        $student->class = $request->class;
        $student->nationality = $request->nationality;
        $student->age = $request->age;
        $student->notes = $request->notes;
        $student->save();

        $studentInformation = new StudentInformation();
        $studentInformation->student_id = $student->id;
        $studentInformation->teacher_id =$request->teacher;
        $studentInformation->mentor_id = $request->mentor;
        $studentInformation->save();

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        $this->authorize('access_student');
        $studentInformation = StudentInformation::where('student_id', '=', $student->id)->first();
        return view('dashboard.students.show', [
            'student' => $student->load('guardian'),
            'teacher' => $studentInformation->teacher->name,
            'mentor' => $studentInformation->mentor->name,
            'followUpRecord' => FollowUpRecord::where('student_id', '=', $student->id)->get(),
            'visitsRecord' => VisitsRecord::where('student_id', '=', $student->id)->get(),
            'guidanceSession_lag' => GuidanceSession::where('type', '=', "تأخر دراسي")->where('student_id', '=', $student->id)->get(),
            'guidanceSession_behavior' => GuidanceSession::where('type', '=', "سلوك عدواني")->where('student_id', '=', $student->id)->get(),

        ]);
    }

    public function edit(Student $student)
    {
        $this->authorize('update_student');
        $studentInformation = StudentInformation::where('student_id', '=', $student->id)->first();

        return view('dashboard.students.edit', [
            'student' => $student->load('guardian'),
            'teachers' => User::whereHas('roles', function ($query) {
                return $query->where('name', '=', 'teacher');
            })->get(),
            'mentors' => User::whereHas('roles', function ($query) {
                return $query->where('name', '=', 'mentor');
            })->get(),
            'teacher_id' => $studentInformation->teacher_id,
            'mentor_id' => $studentInformation->mentor_id
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $this->authorize('update_student');

        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'guardian_name' => 'required',
            'guardian_phone' => 'required',
            'class' => 'required',
        ]);

        $guardian = $student->guardian;
        $guardian->name = $request->guardian_name;
        $guardian->phone = $request->guardian_phone;
        $guardian->attribute = $request->guardian_attribute;
        $guardian->save();

        $student->name = $request->name;
        $student->number = $request->number;
        $student->class = $request->class;
        $student->nationality = $request->nationality;
        $student->age = $request->age;
        $student->notes = $request->notes;
        $student->update();

        $studentInformation = StudentInformation::where('student_id', '=', $student->id)->first();
        $studentInformation->teacher_id =$request->teacher;
        $studentInformation->mentor_id = $request->mentor;
        $studentInformation->save();

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $this->authorize('delete_student');
        $student->delete();
        return redirect()->route('students.index');
    }
}
