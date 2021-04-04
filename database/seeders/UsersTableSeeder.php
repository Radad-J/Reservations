<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Db::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $users = [
            [
                'login' => 'bob123',
                'password' => '$2y$10$O8TR5s3ouefCXXR9lAyetuT0i2cpuG3z0uxSk1e3rAIWnLnJJIVf2', // 12345678
                'firstname' => 'bob',
                'lastname' => 'sull',
                'email' => 'bob@sull.com',
                'language' => 'fr',
            ],
            [
                'login' => 'john123',
                'password' => '$2y$10$O8TR5s3ouefCXXR9lAyetuT0i2cpuG3z0uxSk1e3rAIWnLnJJIVf2',
                'firstname' => 'john',
                'lastname' => 'doe',
                'email' => 'john@doe.com',
                'language' => 'en',
            ],
        ];

        foreach ($users as $user) {

            DB::table('users')->insert([
                'login' => $user['login'],
                'name' => $user['name'],
                'password' => $user['password'],
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'email' => $user['email'],
                'language' => $user['language'],
            ]);
        }
    }
}
