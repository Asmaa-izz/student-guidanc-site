<?php

namespace App\Http\Controllers;

use App\Models\StudentInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('access_teacher');

        if ($request->ajax()) {
            $search = $request->get('s');

            $teachers = User::whereHas('roles', function ($query) {
                return $query->where('name', '=', 'teacher');
            })->when($search, function ($querySearch, $search) {
                $querySearch->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%'.$search.'%');
                });
            })->get();

            return \Yajra\DataTables\DataTables::of($teachers)
                ->addColumn(
                    'name',
                    function (User $user) {
                        return '<a href="/dashboard/teachers/'.$user->id.'" class="btn btn-link">'.$user->name.'</a>';
                    })
                ->addColumn(
                    'action',
                    function (User $user) {
                        return '<a href="/dashboard/teachers/'.$user->id.'/edit" class="btn btn-primary">تعديل </a>
                                <button type="button" onClick="deleteProduct('.$user->id.')" class="btn btn-danger">
                                حذف
                                </button>';
                    })
                ->rawColumns(['name','action'])->make(true);
        } else {
            return view('dashboard.teachers.index');
        }

    }

    public function create()
    {
        $this->authorize('create_teacher');
        return view('dashboard.teachers.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create_teacher');
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        $teacher = new User();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->save();

        $teacher->assignRole('teacher');

        return redirect()->route('teachers.index');
    }

    public function show(User $teacher)
    {
        $studentInformation = StudentInformation::where('teacher_id', '=', $teacher->id)->count();

        $this->authorize('access_teacher');
        return view('dashboard.teachers.show', [
            'teacher' => $teacher,
            'teacherـstudent_count' => $studentInformation
        ]);
    }

    public function edit(User $teacher)
    {
        $this->authorize('update_teacher');
        return view('dashboard.teachers.edit', [
            'teacher' => $teacher
        ]);
    }

    public function update(Request $request, User $teacher)
    {
        $this->authorize('update_teacher');
        $request->validate([
            'name' => 'required',
        ]);

        $teacher->name = $request->name;
        if($request->password) {
            $teacher->password = Hash::make($request->password);
        }

        $teacher->update();

        return redirect()->route('teachers.index');
    }

    public function destroy(User $teacher)
    {
        $this->authorize('delete_teacher');
        $teacher->delete();

        return redirect()->route('teachers.index');
    }
}
