<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RollAndPermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $mentorsRole = Role::firstOrCreate(['name' => 'mentor']);

        Permission::firstOrCreate(['name' => 'access_teacher']);
        Permission::firstOrCreate(['name' => 'create_teacher']);
        Permission::firstOrCreate(['name' => 'update_teacher']);
        Permission::firstOrCreate(['name' => 'delete_teacher']);

        Permission::firstOrCreate(['name' => 'access_mentor']);
        Permission::firstOrCreate(['name' => 'create_mentor']);
        Permission::firstOrCreate(['name' => 'update_mentor']);
        Permission::firstOrCreate(['name' => 'delete_mentor']);

        Permission::firstOrCreate(['name' => 'access_student']);
        Permission::firstOrCreate(['name' => 'create_student']);
        Permission::firstOrCreate(['name' => 'update_student']);
        Permission::firstOrCreate(['name' => 'delete_student']);


        $adminPermissions = Permission::all()->pluck('name')->toArray();
        $adminRole->syncPermissions($adminPermissions);


        $teacherRole->syncPermissions([
            'access_student', 'create_student', 'update_student', 'delete_student',
        ]);

    }
}
