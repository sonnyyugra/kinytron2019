<?php

use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<11;$i++){
            factory(\Kinytron\Answer::class, 20)->create(['user_id' => $i]);
        }
    }
}
