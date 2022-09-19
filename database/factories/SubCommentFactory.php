<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\subComment>
 */
class SubCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sub_comment'=>$this->faker->domainName,
            'product_id'=>$this->faker->numberBetween(1,5),
            'comment_id'=>$this->faker->numberBetween(1,10),
        ];
    }
}
