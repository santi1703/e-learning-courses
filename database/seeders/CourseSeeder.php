<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Course::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Course::factory()->createMany([
            [
                'name' => 'Mathematics',
            ],
            [
                'name' => 'Geometry',
                'previous_id' => 1,
            ],
            [
                'name' => 'Geometry II',
                'previous_id' => 2,
            ],
            [
                'name' => 'Geometry III',
                'previous_id' => 3,
            ],
            [
                'name' => 'Physics',
                'previous_id' => 1,
            ],
            [
                'name' => 'Physics II',
                'previous_id' => 5,
            ],
        ]);
    }
}
