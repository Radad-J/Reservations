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
        Db::table('roles')->truncate();

        //Define data
        DB::table('roles')->insert([
            ['role'=>'admin'],
            ['role'=>'member'],
            ['role'=>'affiliate'],
        ]);
    }
}
