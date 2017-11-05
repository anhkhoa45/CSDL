<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_courses', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->integer('buyer_id')->unsigned();
            $table->datetime('date_bought');
            $table->integer('rating')->unsigned()->nullable();           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy_courses');
    }
}
