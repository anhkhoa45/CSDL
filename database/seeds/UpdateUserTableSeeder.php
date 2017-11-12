<?php

use Illuminate\Database\Seeder;

class UpdateUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $ids = DB::table('users')->pluck('id');
        foreach ($ids as $id) {
            DB::table('users')->where('id', $id)->update([
                'description' => $faker->realText(50),
            ]);
        }
    }
}
