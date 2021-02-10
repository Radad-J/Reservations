<?php

namespace Database\Seeders;

use App\Models\Type;
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
        Type::truncate();

        DB::table('types')->insert([
            ['type'=>'acteur'],
            ['type'=>'scénographe'],
            ['type'=>'comédien'],
        ]);
    }
}
