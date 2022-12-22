<?php

namespace Tests\Feature\Project;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use \Pest\Laravel;

class ProjectStoreCheckTest extends TestCase 
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed('RoleAndPermissionSeeder');
        $this->seed('UserSeeder');
        $this->User = User::factory()->create();
        $this->Project = Project::factory()->create();
    }

    
}
