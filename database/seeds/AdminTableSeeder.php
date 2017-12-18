<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            'email'=>'huudung2411@test.com',
            'password'=>Hash::make('123456'),
            'name'=> 'Huu Dung',
            'DOB'=>'1997-11-24',
            'address'=>'Minh Khai',
            'gender'=>'male',
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
    }
}
