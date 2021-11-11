<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> null,
                'shared'         => false,
            ],
            [
                'id'             => 2,
                'name'           => 'Paul Odgen',
                'email'          => 'pogden@nutters.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> null,
                'shared'         => false,
            ],
            [
                'id'             => 3,
                'name'           => 'HeadOffice',
                'email'          => 'headoffice@headoffice.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> null,
                'shared'         => false,
            ],
            [
                'id'             => 4,
                'name'           => 'Manager',
                'email'          => 'manager@manager.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 1,
                'shared'         => false,
            ],
            [
                'id'             => 5,
                'name'           => 'Medicine Hat',
                'email'          => 'emp@emp.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 1,
                'shared'         => true,
            ],

        ];

        User::insert($users);
    }
}

