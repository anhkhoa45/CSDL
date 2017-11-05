<?php

use Illuminate\Database\Seeder;

class ProjectFileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
        $faker = Faker\Factory::create();

        for($j = 1; $j < 50; $j++) {
                DB::table('project_files')->insert([
                        'link' => 'www.googledriver.com',
                        'id_student_project' =>rand(1,50),
                        'name' => $faker->realText(50),
                       	'type'     => 'file.php',
                		'description'    => $faker->realText(300)
                ]);
            
        }    }
    }
}
