<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CourseSeeder::class,
            LessonSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::delete('delete from course_user');
        DB::insert('insert into course_user (course_id, user_id) values (?, ?)', [1, 4]);
        DB::insert('insert into course_user (course_id, user_id) values (?, ?)', [2, 4]);

        DB::delete('delete from lesson_user');
        DB::insert('insert into lesson_user (lesson_id, user_id) values (?, ?)', [1, 4]);
        DB::insert('insert into lesson_user (lesson_id, user_id) values (?, ?)', [2, 4]);

        DB::delete('delete from question_user');
        DB::insert('insert into question_user (question_id, user_id) values (?, ?)', [1, 4]);
        DB::insert('insert into question_user (question_id, user_id) values (?, ?)', [2, 4]);
        DB::insert('insert into question_user (question_id, user_id) values (?, ?)', [3, 4]);
        DB::insert('insert into question_user (question_id, user_id) values (?, ?)', [4, 4]);
        DB::insert('insert into question_user (question_id, user_id) values (?, ?)', [5, 4]);

        DB::delete('delete from answer_user');
        DB::insert('insert into answer_user (answer_id, user_id) values (?, ?)', [2, 4]);
        DB::insert('insert into answer_user (answer_id, user_id) values (?, ?)', [4, 4]);
        DB::insert('insert into answer_user (answer_id, user_id) values (?, ?)', [7, 4]);
        DB::insert('insert into answer_user (answer_id, user_id) values (?, ?)', [8, 4]);
        DB::insert('insert into answer_user (answer_id, user_id) values (?, ?)', [9, 4]);
        DB::insert('insert into answer_user (answer_id, user_id) values (?, ?)', [11, 4]);
        DB::insert('insert into answer_user (answer_id, user_id) values (?, ?)', [13, 4]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
