<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CollegeTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(UserTableSeeder::class);
        DB::table('exams')->insert([
            'name' => 'ESCALA DE CLIMA ESCOLAR',
        ]);
        DB::table('exams')->insert([
            'name' => 'AUTOESTIMA',
        ]);
        DB::table('measurements')->insert([
            'user_id' => 2,
            'exam_id' => 1,
            'course_id' => 1,
            'college_id' => 1,
            'active' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $this->call(AnswerSeeder::class);
        DB::table('users')->insert([
            'name' => 'Sonny Yugra',
            'password' => bcrypt('1821990snyc@'), // secret
            'remember_token' => str_random(10),
            'email' => 'sonnyyugra@kinytron.com',
            'user_type' => 10,
        ]);
        DB::table('users')->insert([
            'name' => 'Tutor',
            'password' => bcrypt('123123'), // secret
            'remember_token' => str_random(10),
            'email' => 'sonnyyugra@gmail.com',
            'user_type' => 5,
            'college_id' => 1,
        ]);

    }
}
