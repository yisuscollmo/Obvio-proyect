<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categories_id' => $this->faker->numberBetween(1, 5),
            'code' => $this->faker->ean8(),            
            'name' => $this->faker->name(),
            'selling_price' => $this->faker->numberBetween(100000, 1000000),
            'stock' => $this->faker->numberBetween(0, 100),
            'description' => $this->faker->text($maxNbChars = 100),
            'image' => "https://png.pngtree.com/png-vector/20210604/ourmid/pngtree-gray-network-placeholder-png-image_3416659.jpg",
            'active' => true,  
            //
        ];
    }
}
