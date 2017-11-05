<?php

use Illuminate\Database\Seeder;

class RequiredProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('required_projects')->truncate();

        factory(\App\RequiredProject::class, 20)->create();
    }
}
