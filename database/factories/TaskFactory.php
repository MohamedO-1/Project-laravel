<?php

namespace Database\Factories;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
   // protected $model = Task::class;
    public function definition()
    {
     


        return [
            'text' =>$this->faker->text,
            'startdate' =>$this->faker->date,
            'enddate' =>$this->faker->date,
            'user_id' =>User::all()->random()->id,
            'project_id' =>Project::all()->random()->id,
            'activity_id' =>Activity::all()->random()->id
            
        ];
    }
}
