<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst(implode(' ', $this->faker->words(random_int(1, 5)))),
            'previous_id' => mt_rand(0, 1) ? null : Course::where('id', '>', 6)->inRandomOrder()->limit(1)->pluck('id')->pop(),
        ];
    }
}
