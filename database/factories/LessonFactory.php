<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
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
            'threshold' => $this->faker->numberBetween(1, 10) * 10,
            'course_id' => Course::where('id', '>', 6)->inRandomOrder()->limit(1)->pluck('id')->pop(),
        ];
    }
}
