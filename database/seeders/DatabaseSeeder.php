<?php

namespace Database\Seeders;

use App\Models\Representation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();
        $this->call([
            ArtistsTableSeeder::class,
            TypesTableSeeder::class,
            LocalitiesTableSeeder::class,
            RolesTableSeeder::class,
            LocationsTableSeeder::class,
            ShowsTableSeeder::class,
            RepresentationsTableSeeder::class,
            ArtistTypeTableSeeder::class,
            ArtistTypeShowTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
        ]);

    }
}
