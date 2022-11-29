<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IncomesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'articles_id' => $this->faker->numberBetween(1, 100),
            'providers_id' => $this->faker->numberBetween(1, 10),
            // 'sales_id' => $this->faker->numberBetween(1, 10),
            'income_number' => $this->faker->numberBetween(0, 1000000),
            'subtotal'=>$this->faker->numberBetween(100000, 9999999),
            'iva'=>$this->faker->numberBetween(10000, 999999),
            'total' => $this->faker->numberBetween(0, 1000000),
            'date' => $this->faker->date()
            //
        ];
    }
}
