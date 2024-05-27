<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::factory()->createMany([
            [
                'name' => 'J. J. Admin',
                'email' => 'admin@elearning.com',
                'role_id' => Role::ADMIN,
            ],
            [
                'name' => 'Mr. Professor',
                'email' => 'the.professor@elearning.com',
                'role_id' => Role::PROFESSOR,
            ],
            [
                'name' => 'Mrs. Professor',
                'email' => 'the.professor.woman@elearning.com',
                'role_id' => Role::PROFESSOR,
            ],
            [
                'name' => 'Abraham Cromwell',
                'email' => 'abraham_cromwell@elearning.com',
                'role_id' => Role::STUDENT,
            ],
        ]);

        User::factory(10)->create();
    }
}
