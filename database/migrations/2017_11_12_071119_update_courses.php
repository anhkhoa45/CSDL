<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function(Blueprint $table) {
            // DB::statement('ALTER TABLE courses ADD COLUMN categorie_id integer');
            // DB::statement('alter table courses Add constraint fk_ca_co foreign key (categorie_id) references categories(id)');

            DB::statement('ALTER TABLE courses RENAME categorie_id TO category_id');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
