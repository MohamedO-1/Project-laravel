<?php

use App\Models\User;
use App\Models\Project;
use \Pest\Laravel;

beforeEach(function (){
    $this->seed('RoleAndPermissionSeeder');
    $this->seed('UserSeeder');
    $this->project = Project::factory()->create();
});

test('student can not see the edit page', function()
{
    $student = User::find(1);
    Laravel\be($student)
        ->get(route('projects.edit', ['project' => $this->project->id]))
        ->assertForbidden();
})->group('ProjectEdit');

test('guest can not see the edit page', function(){
    $this->get(route('projects.edit', ['project' => $this->project->id]))
        ->assertRedirect(route('login'));
})->group('ProjectEdit');


test('admin can see the edit page', function()
  {
    
      $admin = User::find(3);
      $project = Project::factory()->make();
      Laravel\be($admin)
          ->get(route('projects.edit', ['project' => $this->project->id]))
          ->assertViewIs('admin.projects.edit')
          ->assertSee($this->project->name)
          ->assertSee($this->project->description)
          ->assertStatus(200);
})->group('ProjectEdit');

test('teacher can see the edit page', function()
  {
    $teacher = User::find(2);
    $project = Project::factory()->make();
    Laravel\be($teacher)
          ->get(route('projects.edit', ['project' => $this->project->id]))
          ->assertViewIs('admin.projects.edit')
          ->assertSee($this->project->name)
          ->assertSee($this->project->description)
          ->assertStatus(200);
  })->group('ProjectEdit');