<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SuperAdmin = Role::create(['name' => 'Super Admin']);
        $teacher = Role::create(['name' => 'Teacher']);

        $teacher->givePermissionTo([

            'read-student',
            'update-student',

        ]);

        $SuperAdmin->givePermissionTo([

            'create-role',
            'read-role',
            'update-role',
            'delete-role',
            'create-user',
            'read-user',
            'update-user',
            'delete-user',
            'create-student',
            'update-student',
            'read-student',
            'delete-student'

                ]);

    }
}
