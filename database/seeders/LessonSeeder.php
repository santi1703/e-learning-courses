<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Lesson::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Lesson::factory()->createMany([
            [
                'name' => 'Introduction',
                'course_id' => 1,
                'threshold' => 10,
            ],
            [
                'name' => 'Fundaments of maths',
                'course_id' => 1,
                'previous_id' => 1,
                'threshold' => 30,
            ],
            [
                'name' => 'Zaermelo-Fraenkel axioms',
                'course_id' => 1,
                'previous_id' => 2,
                'threshold' => 30,
            ],
            [
                'name' => 'Introduction',
                'course_id' => 2,
                'threshold' => 10,
            ],
            [
                'name' => '2d geometric concepts',
                'course_id' => 2,
                'previous_id' => 4,
                'threshold' => 30,
            ],
            [
                'name' => '3d geometric concepts',
                'course_id' => 2,
                'previous_id' => 5,
                'threshold' => 30,
            ],
        ]);

//        Lesson::factory(20)->create();
    }
}
