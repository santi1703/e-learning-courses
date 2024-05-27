<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'statement' => $this->faker->realText(25),
            'multiple' => $this->faker->boolean(),
            'exhaustive' => $this->faker->boolean(),
            'score' => $this->faker->numberBetween(2, 5) * 5,
            'lesson_id' => Lesson::inRandomOrder()->limit(1)->pluck('id')->pop(),
        ];
    }
}
