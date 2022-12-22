<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create customer
        $student = User::factory()->create([
            'name'      => 'Student',
            'email'     => 'student@tcrmbo.nl',
            'password'  => Hash::make('test1234')
        ]);
        $student->assignRole('student');
        
        // create sales
        $teacher = User::factory()->create([
            'name'      => 'Teacher',
            'email'     => 'teacher@tcrmbo.nl',
            'password'  => Hash::make('test1234')
        ]);
        $teacher->assignRole('teacher');
    
        //create admin
        $admin = User::factory()->create([
            'name'      => 'Admin',
            'email'     => 'admin@tcrmbo.nl',
            'password'  => Hash::make('test1234')
        ]);
        $admin->assignRole('admin');
    }
}
