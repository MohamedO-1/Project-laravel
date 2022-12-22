<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'description'=>$this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'created_at' =>$this->faker->dateTimeThisDecade('now', 'Europe/Amsterdam'),
            'updated_at' =>$this->faker->dateTimeThisDecade('now', 'Europe/Amsterdam'),
        ];
    }
}
