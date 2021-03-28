<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Representation;

class RepresentationUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $representationsUsers = [
            [
                'user_login' => 'bob123',
                'representation_id' => 2,
                'places' => 5,
            ],
            [
                'user_login' => 'john123',
                'representation_id' => 2,
                'places' => 1,
            ],
            [
                'user_login' => 'john123',
                'representation_id' => 3,
                'places' => 4,
            ],
            [
                'user_login' => 'bob123',
                'representation_id' => 1,
                'places' => 2,
            ],
        ];

        foreach ($representationsUsers as $representationsUser) {
            $user = User::firstWhere('login', $representationsUser['user_login']);

            DB::table('representation_user')->insert([
                'user_id' => $user->id,
                'representation_id' => $representationsUser['representation_id'],
                'places' => $representationsUser['places'],
            ]);
        }
    }
}
