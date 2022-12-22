<?php

use App\Models\User;
use App\Models\Project;
use \Pest\Laravel;

beforeEach(function (){
    $this->seed('RoleAndPermissionSeeder');
    $this->seed('UserSeeder');
    $this->project = Project::factory()->create();
});

test('student can not update a project', function()
{
    $student = User::find(1);
    $project = Project::find(1);
    Laravel\be($student)
        ->patchJson(route('projects.update', ['project' => $this->project->id]),
        array_merge($project->toArray()))
        ->assertForbidden();
})->group('ProjectUpdate');

test('guest can not update a project', function(){
    $project = Project::find(1);
    $this->patchJson(route('projects.update', ['project' => $this->project->id]),
    array_merge($project->toArray()))
    ->assertStatus(401);
})->group('ProjectUpdate');

test('admin can update a project', function()
  {
      $admin = User::find(3);
      $project = Project::factory()->create(['name' => 'TestProject']);
      Laravel\be($admin)
      ->patchJson(route('projects.update', ['project' => $this->project->id]),
      ['name' => 'Nog geen project', 
        'description' => 'dit is een test',
        'id' => $project->id]);

      $this->project = $this->project->fresh();

      $this->get(route('projects.index'))
          ->assertSee($this->project->name);

})->group('ProjectUpdate');

test('Teacher can update a project', function()
  {
      $teacher = User::find(2);
      $project = Project::factory()->create(['name' => 'Nog een project']);
      Laravel\be($teacher)
          ->patchJson(route('projects.update', ['project' => $this->project->id]),
          ['name' => 'Nog geen project', 
            'description' => 'dit is een test',
            'project_id' => $project->id]);

      $this->project = $this->project->fresh();


      $this->get(route('projects.index'))
          ->assertSee($this->project->name);

})->group('ProjectUpdate');