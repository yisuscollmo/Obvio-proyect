<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name(''),
            'image' => "https://latarta.com.co/wp-content/uploads/2018/06/default-placeholder.png",
            //
        ];
    }
}
