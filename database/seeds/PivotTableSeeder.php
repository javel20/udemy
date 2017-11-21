<?php

use Illuminate\Database\Seeder;

class PivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assigned_roles')->insert(['user_id' =>'1', 'role_id'=>'1']);
        DB::table('assigned_roles')->insert(['user_id' =>'2', 'role_id'=>'2']);
    }
}
