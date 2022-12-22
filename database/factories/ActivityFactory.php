<?php

namespace Database\Factories;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Activity::class;
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'created_at' =>$this->faker->dateTimeThisDecade('now', 'Europe/Amsterdam'),
            'updated_at' =>$this->faker->dateTimeThisDecade('now', 'Europe/Amsterdam'),
            
        ];
    }
}
