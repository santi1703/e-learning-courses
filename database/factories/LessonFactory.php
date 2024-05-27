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
            'name' => $this->faker->realText('50'),
            'threshold' => $this->faker->numberBetween(1, 10) * 10,
            'course_id' => Course::inRandomOrder()->limit(1)->pluck('id')->pop(),
        ];
    }
}
