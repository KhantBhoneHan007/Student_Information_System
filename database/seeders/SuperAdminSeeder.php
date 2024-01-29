<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $teacher = User::create([
            'name' => 'Ahri',
            'email' => 'Ahri@gmail.com',
            'password' => Hash::make('password')
        ]);
        $teacher->assignRole('teacher');
    }
}
