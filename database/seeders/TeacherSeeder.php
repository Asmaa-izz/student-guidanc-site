<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('teacher');
        });

    }
}
