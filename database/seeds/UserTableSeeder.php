<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' =>'javier elias', 'email'=>'javier@gmail.com','password'=>bcrypt('javier')]);
        DB::table('users')->insert(['name' =>'javier elias', 'email'=>'elias@gmail.com','password'=>bcrypt('elias')]);
    }
}
