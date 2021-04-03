<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('types')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        //Define data
        DB::table('types')->insert([
            ['type'=>'acteur'],
            ['type'=>'scénographe'],
            ['type'=>'comédien'],
            ['type'=>'auteur'],
        ]);
    }
}
