<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'dni' => $this->faker->ean8(),  
            'name' => $this->faker->name(),
            'dni_type' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'phone_number' => $this->faker->numberBetween(30000000, 39999999),
           
            //
        ];
    }
}
