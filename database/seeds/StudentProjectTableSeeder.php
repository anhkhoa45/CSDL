<?php

use Illuminate\Database\Seeder;

class StudentProjectTableSeeder extends Seeder
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
                DB::table('student_projects')->insert([
                        'performer_id' => rand(52,102),
                        'project_req_id' =>rand(1,50),
                        'status' => 'none',
                       	'created_at'     => date('Y-m-d H:i:s'),
                		'updated_at'    => date('Y-m-d H:i:s')
                ]);
            
        }    }
    }
}
