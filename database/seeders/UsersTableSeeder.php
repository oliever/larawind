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
                'type'          => 'admin',
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
                'type'          => 'admin',
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
                'type'             => 'headoffice',
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
                'type'             => 'manager',
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
                'type'             => 'employee',
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

