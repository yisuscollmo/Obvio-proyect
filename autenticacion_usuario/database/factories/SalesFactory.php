<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SalesFactory extends Factory
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
            // 'sales_id' => $this->faker->numberBetween(1, 10),
            'sales_number' => $this->faker->numberBetween(0, 1000000),
            'state'=>$this->faker->numberBetween(0, 3),
            'total' => $this->faker->numberBetween(0, 1000000),
            'date' => $this->faker->date()

            //
        ];
    }
}
