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
                'level'          => 'admin',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 999,
                'shared'         => false,
            ],
            [
                'id'             => 2,
                'name'           => 'Paul Odgen',
                'email'          => 'pogden@nutters.com',
                'level'          => 'admin',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 999,
                'shared'         => false,
            ],
            [
                'id'             => 3,
                'name'           => 'Head Office Manager',
                'email'          => 'ho.manager@nutters.com',
                'level'             => 'headoffice_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 999,
                'shared'         => true,
            ],
            [
                'id'             => 4,
                'name'           => 'Head Office Staff',
                'email'          => 'ho.staff@nutters.com',
                'level'             => 'headoffice_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 999,
                'shared'         => true,
            ],
            /* Medhat */
            [
                'id'             => 5,
                'name'           => 'Medicine Hat Manager',
                'email'          => 'medhat.manager@nutters.com',
                'level'             => 'store_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 1,
                'shared'         => true,
            ],
            [
                'id'             => 6,
                'name'           => 'Medicine Hat Staff',
                'email'          => 'medhat.staff@nutters.com',
                'level'             => 'store_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 1,
                'shared'         => true,
            ],
            /* Red Deer */
            [
                'id'             => 7,
                'name'           => 'Red Deer Manager',
                'email'          => 'reddeer.manager@nutters.com',
                'level'             => 'store_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 3,
                'shared'         => true,
            ],
            [
                'id'             => 8,
                'name'           => 'Red Deer Staff',
                'email'          => 'reddeer.staff@nutters.com',
                'level'             => 'store_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 3,
                'shared'         => true,
            ],

        ];

        User::insert($users);
    }
}

