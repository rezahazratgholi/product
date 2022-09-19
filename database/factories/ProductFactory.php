<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'product_name'=>$this->faker->domainName,
            'color'=>$this->faker->colorName,
            'image'=>$this->faker->imageUrl,
            'available'=>$this->faker->boolean,
            'price'=>$this->faker->numberBetween(1000,200000),
        ];
    }
}
