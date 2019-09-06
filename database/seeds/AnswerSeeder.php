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
        // //AUTOESTIMA
        // for ($i = 98; $i < 113; $i++) {
        //     factory(\Kinytron\Answer::class, 20)->create(['user_id' => $i]);
        // }

        //CLIMA
        //
        for ($i = 953; $i < 968; $i++) {
            factory(\Kinytron\Answer::class, 18)->create(['user_id' => $i]);
        }
        //
        //TRABAJO EN EQUIPO
        // for ($i = 953; $i < 968; $i++) {
        //     factory(\Kinytron\Answer::class, 7)->create(['user_id' => $i]);
        // }
    }
}
