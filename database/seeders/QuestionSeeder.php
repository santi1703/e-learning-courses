<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Question::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Question::factory()->createMany([
            [
                'statement' => 'Is mathematics a science?',
                'multiple' => false,
                'exhaustive' => false,
                'score' => 5,
                'lesson_id' => 1,
            ],
            [
                'statement' => 'Which is the purpose of math?',
                'multiple' => false,
                'exhaustive' => false,
                'score' => 5,
                'lesson_id' => 1,
            ],
            [
                'statement' => 'How do we determine what is and what is not math?',
                'multiple' => true,
                'exhaustive' => false,
                'score' => 15,
                'lesson_id' => 2,
            ],
            [
                'statement' => 'What is a deterministic system? (Mark all the correct answers)',
                'multiple' => true,
                'exhaustive' => true,
                'score' => 15,
                'lesson_id' => 2,
            ],
            [
                'statement' => 'How many Zaermelo-Fraenkel axioms do exist?',
                'multiple' => false,
                'exhaustive' => false,
                'score' => 30,
                'lesson_id' => 3,
            ],
            [
                'statement' => 'Were the ancient greek the first civilization to came up with geometry?',
                'multiple' => false,
                'exhaustive' => false,
                'score' => 10,
                'lesson_id' => 4,
            ],
            [
                'statement' => 'Where is the origin of geometry?',
                'multiple' => false,
                'exhaustive' => false,
                'score' => 15,
                'lesson_id' => 5,
            ],
            [
                'statement' => 'Are there triangles in which their inner angles add up to other number than 180º?',
                'multiple' => false,
                'exhaustive' => false,
                'score' => 15,
                'lesson_id' => 5,
            ],
            ['statement' => 'How many axis do exist in a 3d environment?',
                'multiple' => false,
                'exhaustive' => false,
                'score' => 5,
                'lesson_id' => 6,
            ],
            [
                'statement' => 'Do fractional dimensions exist?',
                'multiple' => false,
                'exhaustive' => false,
                'score' => 15,
                'lesson_id' => 6,
            ],
            ['statement' => 'Which trigonometric functions are known for their cyclic behaviour? (Mark all the correct answers)',
                'multiple' => true,
                'exhaustive' => true,
                'score' => 10,
                'lesson_id' => 6,
            ],
        ]);
    }
}
