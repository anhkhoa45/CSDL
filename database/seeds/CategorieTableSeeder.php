<?php

use Illuminate\Database\Seeder;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt=['php','web','java'];
        for($i=0;$i < 3;$i++) {
            DB::table('categories')->insert([
                'name' => $dt[rand(0, count($dt) - 1)],

            ]);
        }

    }

}

