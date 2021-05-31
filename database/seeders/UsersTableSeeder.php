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
                'name' => 'Bob',
                'password' => '$2y$10$O8TR5s3ouefCXXR9lAyetuT0i2cpuG3z0uxSk1e3rAIWnLnJJIVf2', // 12345678
                'email' => 'bob@sull.com',
            ],
            [
                'name' => 'John',
                'password' => '$2y$10$O8TR5s3ouefCXXR9lAyetuT0i2cpuG3z0uxSk1e3rAIWnLnJJIVf2',
                'email' => 'john@doe.com',
            ],
        ];

        foreach ($users as $user) {

            DB::table('users')->insert([
                'name' => $user['name'],
                'password' => $user['password'],
                'email' => $user['email'],
            ]);
        }
    }
}
