<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Sales_DetailsFactory extends Factory
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
            'users_id' => $this->faker->numberBetween(1, 10),
            'sales_id' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->numberBetween(1, 100),            
            'price' => $this->faker->numberBetween(10000, 100000),
            'subtotal' => $this->faker->numberBetween(10000, 1000000),
            'iva' => $this->faker->numberBetween(10000, 100000),
            'total' => $this->faker->numberBetween(10000, 1000000),
            //
        ];
    }
}
