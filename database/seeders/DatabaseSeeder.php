<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RollAndPermissionSeeder::class,
            AdminSeeder::class,
//            TeacherSeeder::class,
//            MentorSeeder::class,
            StudentSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
