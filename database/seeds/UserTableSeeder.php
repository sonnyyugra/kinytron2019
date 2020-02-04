<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            for($j = 1; $j <= 10; $j++){
                factory(\Kinytron\User::class, 1)->create(['email' => "c".str_pad( $i, 3, "0", STR_PAD_LEFT )."_a".str_pad( $j, 2, "0", STR_PAD_LEFT )."@kinytron.com"]);
            }
        }
    }
}
