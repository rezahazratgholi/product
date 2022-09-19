<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'fullname'=>$this->faker->name,
            'email'=>$this->faker->email,
            'comment'=>$this->faker->title,
            'product_id'=>$this->faker->numberBetween(1,5),
        ];
    }
}
