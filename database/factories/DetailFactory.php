<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detail>
 */
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
            'book_id' => $this->faker->unique()->numberBetween(1,150),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->sentence(2),
            'year' => $this->faker->date('Y'),
            'description' => $this->faker->paragraphs(mt_rand(3,5),true) 
        ];
    }
}
