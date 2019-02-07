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
            $table->boolean('e1c1')->default(0);
            $table->boolean('e1c2')->default(0);
            $table->boolean('e1c3')->default(0);
            $table->boolean('e1c4')->default(0);
            $table->boolean('e2c1')->default(0);
            $table->boolean('e2c2')->default(0);
            $table->boolean('e2c3')->default(0);
            $table->boolean('e2c4')->default(0);
            $table->boolean('e3c1')->default(0);
            $table->boolean('e3c2')->default(0);
            $table->boolean('e3c3')->default(0);
            $table->boolean('e3c4')->default(0);
            $table->boolean('e4c1')->default(0);
            $table->boolean('e4c2')->default(0);
            $table->boolean('e4c3')->default(0);
            $table->boolean('e4c4')->default(0);
            $table->boolean('e5c1')->default(0);
            $table->boolean('e5c2')->default(0);
            $table->boolean('e5c3')->default(0);
            $table->boolean('e5c4')->default(0);
            $table->boolean('e6c1')->default(0);
            $table->boolean('e6c2')->default(0);
            $table->boolean('e6c3')->default(0);
            $table->boolean('e6c4')->default(0);
            $table->boolean('e7c1')->default(0);
            $table->boolean('e7c2')->default(0);
            $table->boolean('e7c3')->default(0);
            $table->boolean('e7c4')->default(0);
            $table->boolean('e8c1')->default(0);
            $table->boolean('e8c2')->default(0);
            $table->boolean('e8c3')->default(0);
            $table->boolean('e8c4')->default(0);
            $table->boolean('e9c1')->default(0);
            $table->boolean('e9c2')->default(0);
            $table->boolean('e9c3')->default(0);
            $table->boolean('e9c4')->default(0);
            $table->boolean('e10c1')->default(0);
            $table->boolean('e10c2')->default(0);
            $table->boolean('e10c3')->default(0);
            $table->boolean('e10c4')->default(0);
            $table->boolean('e11c1')->default(0);
            $table->boolean('e11c2')->default(0);
            $table->boolean('e11c3')->default(0);
            $table->boolean('e11c4')->default(0);
            $table->boolean('e12c1')->default(0);
            $table->boolean('e12c2')->default(0);
            $table->boolean('e12c3')->default(0);
            $table->boolean('e12c4')->default(0);
            $table->boolean('e13c1')->default(0);
            $table->boolean('e13c2')->default(0);
            $table->boolean('e13c3')->default(0);
            $table->boolean('e13c4')->default(0);
            $table->boolean('e14c1')->default(0);
            $table->boolean('e14c2')->default(0);
            $table->boolean('e14c3')->default(0);
            $table->boolean('e14c4')->default(0);
            $table->boolean('e15c1')->default(0);
            $table->boolean('e15c2')->default(0);
            $table->boolean('e15c3')->default(0);
            $table->boolean('e15c4')->default(0);
            $table->boolean('e16c1')->default(0);
            $table->boolean('e16c2')->default(0);
            $table->boolean('e16c3')->default(0);
            $table->boolean('e16c4')->default(0);
            $table->boolean('e17c1')->default(0);
            $table->boolean('e17c2')->default(0);
            $table->boolean('e17c3')->default(0);
            $table->boolean('e17c4')->default(0);
            $table->boolean('e18c1')->default(0);
            $table->boolean('e18c2')->default(0);
            $table->boolean('e18c3')->default(0);
            $table->boolean('e18c4')->default(0);
            $table->boolean('e19c1')->default(0);
            $table->boolean('e19c2')->default(0);
            $table->boolean('e19c3')->default(0);
            $table->boolean('e19c4')->default(0);
            $table->boolean('e20c1')->default(0);
            $table->boolean('e20c2')->default(0);
            $table->boolean('e20c3')->default(0);
            $table->boolean('e20c4')->default(0);
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
