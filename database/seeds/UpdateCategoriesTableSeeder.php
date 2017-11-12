<?php

use Illuminate\Database\Seeder;

class UpdateCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = DB::table('courses')->pluck('id');
        foreach ($ids as $id) {
            DB::table('courses')->where('id', $id)->update([
                'categorie_id' => rand(2,4),
            ]);
        }
    }
}
