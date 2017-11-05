<?php

use Illuminate\Database\Seeder;

class BuyCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker\Factory::create();

        for($i = 0; $i < 50; $i++){
            DB::table('buy_courses')->insert([
                'course_id'          => rand(1,50),
                'buyer_id'          => rand(52, 102),
                'date_bought'        => date('Y-m-d H:i:s'),
                'rating'    => rand(1, 10),
            ]);
    } }
}
