<?php

namespace Database\Seeders;

use App\Models\Guardian;
use App\Models\Student;
use App\Models\StudentInformation;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $g = Guardian::firstOrCreate(['phone' =>'0591234567'], [
            'phone' =>'0591234567',
            'name' => 'ahmad',
            'Attribute' => 'father',
        ]);

        $s = Student::firstOrCreate(['guardian_id' => $g->id, 'name' => 'mohamed'], [
            'guardian_id' => $g->id,
            'name' => 'mohamed',
            'number' => '123456',
            'class' => 'kg0',
            'nationality' => 'Palestinian',
        ]);

        $t = User::whereHas('roles', function ($query) {
                return $query->where('name', '=', 'teacher');
            })->first();

        $m = User::whereHas('roles', function ($query) {
            return $query->where('name', '=', 'mentor');
        })->first();

        StudentInformation::firstOrCreate(['student_id' => $s->id, 'teacher_id' => $t->id, 'mentor_id' => $m->id], [
            'student_id' => $s->id, 'teacher_id' => $t->id, 'mentor_id' => $m->id
        ]);
    }
}
