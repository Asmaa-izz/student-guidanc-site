<?php

namespace App\Http\Controllers;

use App\Models\StudentInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MentorsController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('access_mentor');
        if ($request->ajax()) {
            $search = $request->get('s');

            $mentors = User::whereHas('roles', function ($query) {
                return $query->where('name', '=', 'mentor');
            })->when($search, function ($querySearch, $search) {
                $querySearch->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%'.$search.'%');
                });
            })->get();

            return \Yajra\DataTables\DataTables::of($mentors)
                ->addColumn(
                    'name',
                    function (User $user) {
                        return '<a href="/dashboard/mentors/'.$user->id.'" class="btn btn-link">'.$user->name.'</a>';
                    })
                ->addColumn(
                    'action',
                    function (User $user) {
                        return '<a href="/dashboard/mentors/'.$user->id.'/edit" class="btn btn-primary">تعديل </a>
                                <button type="button" onClick="deleteProduct('.$user->id.')" class="btn btn-danger">
                                حذف
                                </button>';
                    })
                ->rawColumns(['name','action'])->make(true);
        } else {
            return view('dashboard.mentors.index');
        }

    }

    public function create()
    {
        $this->authorize('create_mentor');
        return view('dashboard.mentors.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create_mentor');
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        $mentor = new User();
        $mentor->name = $request->name;
        $mentor->email = $request->email;
        $mentor->password = Hash::make($request->password);
        $mentor->save();

        $mentor->assignRole('mentor');

        return redirect()->route('mentors.index');
    }

    public function show(User $mentor)
    {
        $this->authorize('access_mentor');

        $studentInformation = StudentInformation::where('mentor_id', '=', $mentor->id)->count();

        return view('dashboard.mentors.show', [
            'mentor' => $mentor,
            'mentorـstudent_count' => $studentInformation
        ]);

    }

    public function edit(User $mentor)
    {
        $this->authorize('update_mentor');

        return view('dashboard.mentors.edit', [
            'mentor' => $mentor
        ]);
    }

    public function update(Request $request, User $mentor)
    {
        $this->authorize('update_mentor');

        $request->validate([
            'name' => 'required',
        ]);

        $mentor->name = $request->name;
        if($request->password) {
            $mentor->password = Hash::make($request->password);
        }

        $mentor->update();

        return redirect()->route('mentors.index');
    }

    public function destroy(User $mentor)
    {
        $this->authorize('delete_mentor');

        $mentor->delete();

        return redirect()->route('mentors.index');
    }
}
