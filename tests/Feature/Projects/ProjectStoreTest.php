<?php

use App\Models\User;
use App\Models\Project;
use \Pest\Laravel;

beforeEach(function (){
    $this->seed('RoleAndPermissionSeeder');
    $this->seed('UserSeeder');
    $this->project = Project::factory()->create();
});

test('guest can not create a project in the page admin', function(){
    $this->postJson(route('projects.store'))
        ->assertStatus(401);
})->group('ProjectStore');


test('student can not create a project in the  page admin', function()
{
    $student = User::find(1);
    Laravel\be($student)
        ->get(route('projects.store'))
        ->assertForbidden();
})->group('ProjectStore');

test('admin can create a project in the admin page', function()
  {
    
      $admin = User::find(3);
      $project = Project::factory()->make();

      Laravel\be($admin)
          ->postJson(route('projects.store'), array_merge($project->toArray()))
          ->assertRedirect(route('projects.index'));

       $this->assertDatabaseHas('projects', [
              'name' => $project->name,
              'description' => $project->description
          ]);
})->group('ProjectStore');

test('teacher can create a project in the admin page', function()
  {
    
     $teacher = User::find(2);
     $project = Project::factory()->make();
     
      Laravel\be($teacher)
      ->postJson(route('projects.store'), array_merge($project->toArray()))
      ->assertRedirect(route('projects.index'));

  })->group('ProjectStore');