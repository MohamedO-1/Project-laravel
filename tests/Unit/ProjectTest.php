<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Project;
use \Pest\Laravel;

beforeEach(function (){
    $this->project = Project::factory()->create();
});

test('a project name is a string', function(){
    expect($this->project->name)->toBeString();
})->group('ProjectUnit');

test('a project description is a string', function(){
    expect($this->project->description)->toBeString();
})->group('ProjectUnit');

test('a project id is an int', function(){
    expect($this->project->id)->toBeInt();
})->group('ProjectUnit');

test('a project created at is a datetime', function(){
    expect($this->project->created_at)->toBeInstanceOf(Carbon::class);
})->group('ProjectUnit');

test('a project updated at is a datetime', function(){
    expect($this->project->updated_at)->toBeInstanceOf(Carbon::class);
})->group('ProjectUnit');
