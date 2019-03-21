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
        DB::table('measurements')->insert([
            'user_id' => 2,
            'exam_id' => 2,
            'course_id' => 1,
            'college_id' => 1,
            'active' => 1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        $this->call(AnswerSeeder::class);

        //medallas
        DB::table('medals')->insert([
            'name' => 'El apoyo de todos',
            'description' => 'Simboliza la union entre el equipo de Vincent, Zeth y Kazuko'
        ]);
        DB::table('medals')->insert([
            'name' => 'Justo a tiempo',
            'description' => 'Lograste darle agua a la chica del desierto'
        ]);
        DB::table('medals')->insert([
            'name' => '¿H0P3 despierto?',
            'description' => 'Lograste encontrar a Kinytron en el vertedero'
        ]);
        DB::table('medals')->insert([
            'name' => 'Trabajo en equipo',
            'description' => 'Encontraste la palabra Kinytron en el nivel Trabajo en equipo'
        ]);
        DB::table('medals')->insert([
            'name' => 'La comunicación es clave',
            'description' => 'Encontraste la palabra Kinytron en el nivel Comunicación asertiva'
        ]);
        DB::table('medals')->insert([
            'name' => 'Ayuda en cadena',
            'description' => 'Lograste completar la mision doble del juego '
        ]);
        DB::table('medals')->insert([
            'name' => 'Valor de Vincent',
            'description' => 'No dudaste en ayudar a H0P3 cuando entro en la base'
        ]);
        DB::table('medals')->insert([
            'name' => 'Compasión',
            'description' => 'Encontraste la palabra Kinytron en el nivel Compasión'
        ]);
        DB::table('medals')->insert([
            'name' => 'Amante de animales',
            'description' => 'Alimentaste al perrito de la base'
        ]);
        DB::table('medals')->insert([
            'name' => 'Favor se paga con favor',
            'description' => 'Rescataste a la niña del derrumbe'
        ]);
        DB::table('medals')->insert([
            'name' => 'Disciplina',
            'description' => 'Encontraste la palabra Kinytron en el nivel Disciplina'
        ]);
        DB::table('medals')->insert([
            'name' => 'La joya no brilla 2 veces',
            'description' => 'Encontraste la gema y se la entregaste al minero'
        ]);
        DB::table('medals')->insert([
            'name' => 'Acciones trascendentes',
            'description' => 'Le llevaste agua a Lonny'
        ]);
        DB::table('medals')->insert([
            'name' => 'Kinytronizate',
            'description' => 'Conseguiste todas las Kinymedallas no existe descripcion de medalla'
        ]);
        //items
        DB::table('items')->insert([
            'name' => 'Gorra de zans',
            'description' => 'La fabulosa gorra de Zans la llama juguetona. (¿podré usarla?) '
        ]);
        DB::table('items')->insert([
            'name' => 'Blindaje',
            'description' => 'El blindaje de Kinytron H0P3 de color dorado'
        ]);
        DB::table('items')->insert([
            'name' => 'Guante',
            'description' => 'Un nanoguante entregado por el guardia de la base subterranea. Te da una fuerza increible por poco tiempo'
        ]);
        DB::table('items')->insert([
            'name' => 'Piedra Valiosa',
            'description' => 'Una de las gemas más raras del mundo. solo se encuentra cada 10 años.'
        ]);
        DB::table('items')->insert([
            'name' => 'Botella ',
            'description' => 'Una botella de plastico vacia'
        ]);
        DB::table('items')->insert([
            'name' => 'Espejo',
            'description' => 'El espejo de Angela, fue un regalo de su abuelo'
        ]);
        DB::table('items')->insert([
            'name' => 'Botella llena',
            'description' => 'Una botella de plastico llena de agua'
        ]);


    }
}
