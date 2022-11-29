<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Income_ContsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'articles_id' => $this->faker->numberBetween(1, 100),
            'incomes_id' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->numberBetween(1, 100),            
            'price' => $this->faker->numberBetween(100000, 1000000),
            'total' => $this->faker->numberBetween(0, 1000000),
            
            //
        ];
    }
}
