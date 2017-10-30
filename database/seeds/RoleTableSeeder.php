<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['name' =>'admin', 'display_name'=>'Administrador del sitio','description'=>'aasdqwd']);
        DB::table('roles')->insert(['name' =>'mod', 'display_name'=>'Moderador de comentarios','description'=>'qweqwewqe']);
    }
}
