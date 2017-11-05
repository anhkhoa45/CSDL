<?php

use Illuminate\Database\Seeder;

class WatchVideoTableSeeder extends Seeder
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
            DB::table('watch_videos')->insert([
                'user_id'          => rand(52,102),
                'video_id'          => rand(1, 50),
                'last_seen'        => date('Y-m-d H:i:s'),
                'total_view'    => rand(1, 100),

            ]);
    } }
}
