<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level');
            $table->string('letter');
            $table->boolean('mod1')->default(0);
            $table->boolean('mod2')->default(0);
            $table->boolean('mod3')->default(0);
            $table->boolean('mod4')->default(0);
            $table->boolean('mod5')->default(0);
            $table->boolean('mod6')->default(0);
            $table->boolean('mod7')->default(0);
            $table->boolean('mod8')->default(0);
            $table->boolean('e1')->default(0);
            $table->boolean('e2')->default(0);
            $table->boolean('e3')->default(0);
            $table->boolean('e4')->default(0);
            $table->boolean('e5')->default(0);
            $table->boolean('e6')->default(0);
            $table->boolean('e7')->default(0);
            $table->boolean('e8')->default(0);
            $table->boolean('e9')->default(0);
            $table->boolean('e10')->default(0);
            $table->boolean('e11')->default(0);
            $table->boolean('e12')->default(0);
            $table->boolean('e13')->default(0);
            $table->boolean('e14')->default(0);
            $table->boolean('e15')->default(0);
            $table->boolean('e16')->default(0);
            $table->boolean('e17')->default(0);
            $table->boolean('e18')->default(0);
            $table->boolean('e19')->default(0);
            $table->boolean('e20')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
