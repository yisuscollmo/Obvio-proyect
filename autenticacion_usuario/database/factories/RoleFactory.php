<?php

namespace Database\Factories;

use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->randomElement(['Client', 'Employee']),
            'description' => $this->faker->text($maxNbChars = 100),
            //
     
        ];
    }
}
