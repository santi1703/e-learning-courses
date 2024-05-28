<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'statement' => ucfirst(implode(' ', $this->faker->words(random_int(1, 5)))),
            'correct' => $this->faker->boolean(),
            'question_id' => Question::where('id', '>', 11)->inRandomOrder()->limit(1)->pluck('id')->pop(),
        ];
    }
}
