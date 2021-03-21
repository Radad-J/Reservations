<?php

namespace Database\Seeders;

use App\Models\Locality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('locations')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        //Define data
        $locations = [
            [
                'slug' => null,
                'designation' => 'Espace Delvaux / La Vénerie',
                'address' => '3 rue Gratès',
                'locality_postal_code'=>'1070',
                'locality_id' => null,
                'website' => 'https://www.lavenerie.be',
                'phone' => '+32 (0)2/663.85.50',
            ],
            [
                'slug' => null,
                'designation' => 'Dexia Art Center',
                'address' => '50 rue de l\'Ecuyer',
                'locality_postal_code'=>'1000',
                'locality_id' => null,
                'website' => null,
                'phone' => null,
            ],
            [
                'slug' => null,
                'designation' => 'La Samaritaine',
                'address' => '16 rue de la samaritaine',
                'locality_postal_code'=>'1000',
                'locality_id' => null,
                'website' => 'http://www.lasamaritaine.be/',
                'phone' => null,
            ],
            [
                'slug' => null,
                'designation' => 'Espace Magh',
                'address' => '17 rue du Poinçon',
                'locality_postal_code'=>'1000',
                'locality_id' => null,
                'website' => 'http://www.espacemagh.be',
                'phone' => '+32 (0)2/274.05.10',
            ],
        ];

        //Modify data in the table
        foreach ($locations as &$location) {
            $locality = Locality::firstWhere('postal_code', $location['locality_postal_code']);
            $location['locality_id'] = $locality->id;
            $location['slug'] = Str::slug($location['designation']);
            unset($location['locality_postal_code']);
        }

        //Insert data in the table
        DB::table('locations')->insert($locations);
    }
}
