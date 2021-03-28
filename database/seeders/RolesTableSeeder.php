<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Db::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Define data
        DB::table('roles')->insert([
            ['role'=>'admin'],
            ['role'=>'member'],
            ['role'=>'affiliate'],
        ]);
    }
}
