<?php
use App\Models\User;
use App\Models\Project;
use \Pest\Laravel;

beforeEach(function (){
    $this->seed('RoleAndPermissionSeeder');
    $this->seed('UserSeeder');
    $this->project = Project::factory()->create();
});

test('student can not see the project create page', function()
 {
     $student = User::find(1);
     Laravel\be($student)
         ->get(route('projects.create'))
         ->assertForbidden();
 })->group('ProjectCreate');
 
 test('guest can not see the project create page', function(){
     $this->get(route('projects.create'))
         ->assertRedirect(route('login'));
 })->group('ProjectCreate');

 test('admin can see the project create page', function()
 {
    $this->withoutExceptionHandling();
     $admin = User::find(3);
     Laravel\be($admin)
         ->get(route('projects.create'))
         ->assertViewIs('admin.projects.create')
         ->assertStatus(200);
 })->group('ProjectCreate');

 test('teacher can see the project create page', function()
 {
    $this->withoutExceptionHandling();
    $teacher = User::find(2);
     Laravel\be($teacher)
         ->get(route('projects.create'))
         ->assertViewIs('admin.projects.create')
         ->assertStatus(200);
 })->group('ProjectCreate');