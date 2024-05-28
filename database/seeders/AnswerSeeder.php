<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Answer::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Answer::factory()->createMany([
            [
                'statement' => 'Yes',
                'correct' => false,
                'question_id' => 1
            ],
            [
                'statement' => 'No',
                'correct' => true,
                'question_id' => 1
            ],
            [
                'statement' => 'Entertain',
                'correct' => false,
                'question_id' => 2
            ],
            [
                'statement' => 'Pursue knowledge',
                'correct' => true,
                'question_id' => 2
            ],
            [
                'statement' => 'Know about our own bodies',
                'correct' => false,
                'question_id' => 2
            ],
            [
                'statement' => 'By looking at it in the eyes',
                'correct' => false,
                'question_id' => 3
            ],
            [
                'statement' => 'By asking a professor',
                'correct' => true,
                'question_id' => 3
            ],
            [
                'statement' => 'By taking a crash course',
                'correct' => true,
                'question_id' => 3
            ],
            [
                'statement' => 'One in which we can predetermine its results',
                'correct' => true,
                'question_id' => 4
            ],
            [
                'statement' => 'I\'m hungry',
                'correct' => false,
                'question_id' => 4
            ],
            [
                'statement' => 'One that is deterministic',
                'correct' => true,
                'question_id' => 4
            ],
            [
                'statement' => '5',
                'correct' => false,
                'question_id' => 5
            ],
            [
                'statement' => '10',
                'correct' => true,
                'question_id' => 5
            ],
            [
                'statement' => '15',
                'correct' => false,
                'question_id' => 5
            ],
            [
                'statement' => 'Yes',
                'correct' => true,
                'question_id' => 6
            ],
            [
                'statement' => 'No',
                'correct' => false,
                'question_id' => 6
            ],
            [
                'statement' => 'Athens',
                'correct' => false,
                'question_id' => 7
            ],
            [
                'statement' => 'Sparta',
                'correct' => true,
                'question_id' => 7
            ],
            [
                'statement' => 'China',
                'correct' => false,
                'question_id' => 7
            ],
            [
                'statement' => 'Yes',
                'correct' => false,
                'question_id' => 8
            ],
            [
                'statement' => 'No',
                'correct' => true,
                'question_id' => 8
            ],
            [
                'statement' => '2',
                'correct' => false,
                'question_id' => 9
            ],
            [
                'statement' => '3',
                'correct' => true,
                'question_id' => 9
            ],
            [
                'statement' => '4',
                'correct' => false,
                'question_id' => 9
            ],
            [
                'statement' => 'Yes',
                'correct' => false,
                'question_id' => 10
            ],
            [
                'statement' => 'No',
                'correct' => true,
                'question_id' => 10
            ],
            [
                'statement' => 'Sine',
                'correct' => true,
                'question_id' => 11
            ],
            [
                'statement' => 'Cosine',
                'correct' => true,
                'question_id' => 11
            ],
            [
                'statement' => 'Tangent',
                'correct' => true,
                'question_id' => 11
            ],
            [
                'statement' => 'Derivative',
                'correct' => false,
                'question_id' => 11
            ],
        ]);

//        Answer::factory(200)->create();
    }
}
