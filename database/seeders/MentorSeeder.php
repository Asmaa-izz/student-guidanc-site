<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class MentorSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('mentor');
        });

    }
}
