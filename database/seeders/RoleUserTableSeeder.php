<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleUsers = [
            [
                'role_name' => 'admin',
                'user_login' => 'bob123',
            ],
            [
                'role_name' => 'member',
                'user_login' => 'john123',
            ],
            [
                'role_name' => 'affiliate',
                'user_login' => 'john123',
            ],
        ];

        foreach ($roleUsers as $roleUser) {
            $user = User::firstWhere('login', $roleUser['user_login']);
            $role = Role::firstWhere('role', $roleUser['role_name']);

            DB::table('role_user')->insert([
                'role_id' => $role->id,
                'user_id' => $user->id,
            ]);
        }
    }
}
