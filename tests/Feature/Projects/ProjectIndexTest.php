<?php
use App\Models\User;
use App\Models\Project;
use \Pest\Laravel;

beforeEach(function (){
    $this->seed('RoleAndPermissionSeeder');
    $this->seed('UserSeeder');
    $this->project = Project::factory()->create();
});

test('admin can see the project index page', function()
{
    
    $admin = User::find(3);
    Laravel\be($admin)
        ->get(route('projects.index'))
        ->assertViewIs('admin.projects.index')
        ->assertSee($this->project->id)
        ->assertSee($this->project->name)
        ->assertStatus(200);
})->group('ProjectIndex');

test('teacher can see the project index page', function()
{
    
    $teacher = User::find(2);
    Laravel\be($teacher)
        ->get(route('projects.index'))
        ->assertViewIs('admin.projects.index')
        ->assertSee($this->project->id)
        ->assertSee($this->project->name)
        ->assertStatus(200);
})->group('ProjectIndex');

test('student can not see the project index page', function()
{
    
    $student = User::find(1);
    Laravel\be($student)
        ->get(route('projects.index'))
        ->assertForbidden();
})->group('ProjectIndex');

test('guest can not see the project index page', function(){
    $this->get(route('projects.index'))
        ->assertRedirect(route('login'));
})->group('ProjectIndex');
