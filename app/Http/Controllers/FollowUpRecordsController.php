<?php

namespace App\Http\Controllers;

use App\Models\FollowUpRecord;
use App\Models\Student;
use Illuminate\Http\Request;

class FollowUpRecordsController extends Controller
{
    public function index(Student $student)
    {
        return view('dashboard.records.follow-up.index', [
            'student' => $student
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(FollowUpRecord $followUpRecord)
    {
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
