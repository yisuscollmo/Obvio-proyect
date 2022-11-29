<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'image' => "",
            'dni' => $this->faker->ean8(),  
            'users_id' => $this->faker->numberBetween(1, 10), 
            'dni_type' => $this->faker->name(),
            'address' => $this->faker->address(),
            'phone_number' => $this->faker->numberBetween(1000000000, 9999999999),
            
            //
        ];
    }
}
