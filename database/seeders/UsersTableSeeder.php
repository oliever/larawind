<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $nutters_headoffice_users = [
            [
                'name'           => 'Manpreet Brar',
                'email'          => 'manpreet@equicapita.com',
                'level'          => 'super_admin',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 999,
                'shared'         => true,
            ],
            [
                'name'           => 'Paul Ogden',
                'email'          => 'pogden@nutters.com',
                'level'          => 'headoffice_admin',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 999,
                'shared'         => true,
            ],
            [
                'name'           => 'Brad Winsor',
                'email'          => 'bwinsor@nutters.com',
                'level'          => 'headoffice_admin',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 999,
                'shared'         => true,
            ],
            [
                'name'           => 'Tammy Grue',
                'email'          => 'tgrue@nutters.com',
                'level'             => 'headoffice_admin',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 999,
                'shared'         => true,
            ],
            [
                'name'           => 'Paul Clewes',
                'email'          => 'pclewes@nutters.com',
                'level'             => 'headoffice_admin',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 999,
                'shared'         => true,
            ],
            [
                'name'           => 'Nutters Head Office Staff',
                'email'          => 'ho.staff@nutters.ca',
                'level'             => 'headoffice_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 999,
                'shared'         => true,
            ],
        ];
        User::insert($nutters_headoffice_users);

        $nutters_location_users = [

            /* Medhat */
            [
                'name'           => 'Medicine Hat Manager',
                'email'          => 'medicinehat.mgr@nutters.ca',
                'level'             => 'location_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 1,
                'shared'         => true,
            ],
            [
                'name'           => 'Medicine Hat Staff',
                'email'          => 'medicinehat.staff@nutters.ca',
                'level'             => 'location_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 1,
                'shared'         => true,
            ],
            /* Red Deer */
            [
                'name'           => 'Red Deer Manager',
                'email'          => 'reddeer.mgr@nutters.ca',
                'level'             => 'location_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 3,
                'shared'         => true,
            ],
            [
                'name'           => 'Red Deer Staff',
                'email'          => 'reddeer.staff@nutters.ca',
                'level'             => 'location_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 3,
                'shared'         => true,
            ],
            /* Moose jaw */
            [
                'name'           => 'Moose Jaw Manager',
                'email'          => 'moosejaw.mgr@nutters.ca',
                'level'             => 'location_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 5,
                'shared'         => true,
            ],
            [
                'name'           => 'Moose Jaw Staff',
                'email'          => 'moosejaw.staff@nutters.ca',
                'level'             => 'location_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 5,
                'shared'         => true,
            ],
            /* Lethbridge */
            [
                'name'           => 'Lethbridge Manager',
                'email'          => 'lethbridge.mgr@nutters.ca',
                'level'             => 'location_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 6,
                'shared'         => true,
            ],
            [
                'name'           => 'Lethbridge Staff',
                'email'          => 'lethbridge.staff@nutters.ca',
                'level'             => 'location_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 6,
                'shared'         => true,
            ],
            /* Lloydminster */
            [
                'name'           => 'Lloydminster Manager',
                'email'          => 'lloydminster.mgr@nutters.ca',
                'level'             => 'location_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 10,
                'shared'         => true,
            ],
            [
                'name'           => 'Lloydminster Staff',
                'email'          => 'lloydminster.staff@nutters.ca',
                'level'             => 'location_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 10,
                'shared'         => true,
            ],
            /* Jasper */
            [
                'name'           => 'Jasper Manager',
                'email'          => 'jasper.mgr@nutters.ca',
                'level'             => 'location_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 28,
                'shared'         => true,
            ],
            [
                'name'           => 'Jasper Staff',
                'email'          => 'jasper.staff@nutters.ca',
                'level'             => 'location_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 28,
                'shared'         => true,
            ],
            /* Okotoks */
            [
                'name'           => 'Okotoks Manager',
                'email'          => 'okotoks.mgr@nutters.ca',
                'level'             => 'location_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 44,
                'shared'         => true,
            ],
            [
                'name'           => 'Okotoks Staff',
                'email'          => 'okotoks.staff@nutters.ca',
                'level'             => 'location_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 44,
                'shared'         => true,
            ],
            /* Canmore */
            [
                'name'           => 'Canmore Manager',
                'email'          => 'canmore.mgr@nutters.ca',
                'level'             => 'location_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 44,
                'shared'         => true,
            ],
            [
                'name'           => 'Canmore Staff',
                'email'          => 'canmore.staff@nutters.ca',
                'level'             => 'location_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 44,
                'shared'         => true,
            ],
            /* Camrose */
            [
                'name'           => 'Camrose Manager',
                'email'          => 'camrose.mgr@nutters.ca',
                'level'             => 'location_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 45,
                'shared'         => true,
            ],
            [
                'name'           => 'Camrose Staff',
                'email'          => 'camrose.staff@nutters.ca',
                'level'             => 'location_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 45,
                'shared'         => true,
            ],
            /* Swift Current */
            [
                'name'           => 'Swift Current Manager',
                'email'          => 'swiftcurrent.mgr@nutters.ca',
                'level'             => 'location_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 47,
                'shared'         => true,
            ],
            [
                'name'           => 'Swift Current Staff',
                'email'          => 'swiftcurrent.staff@nutters.ca',
                'level'             => 'location_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 47,
                'shared'         => true,
            ],
            /* Saskatoon */
            [
                'name'           => 'Saskatoon Manager',
                'email'          => 'saskatoon.mgr@nutters.ca',
                'level'             => 'location_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 48,
                'shared'         => true,
            ],
            [
                'name'           => 'Saskatoon Staff',
                'email'          => 'saskatoon.staff@nutters.ca',
                'level'             => 'location_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 48,
                'shared'         => true,
            ],
            /* Airdrie */
            [
                'name'           => 'Airdrie Manager',
                'email'          => 'airdrie.mgr@nutters.ca',
                'level'             => 'location_manager',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 50,
                'shared'         => true,
            ],
            [
                'name'           => 'Airdrie Staff',
                'email'          => 'airdrie.staff@nutters.ca',
                'level'             => 'location_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 1,
                'location_locked'=> 50,
                'shared'         => true,
            ],


        ];
        User::insert($nutters_location_users);

        $ar_metals_location_users = [
            [
                'name'           => 'AR Metals Staff',
                'email'          => 'staff@armetals.ca',
                'level'          => 'location_staff',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'current_team_id'=> 2,
                'location_locked'=> 101,
                'shared'         => true,
            ],
        ];
        User::insert($ar_metals_location_users);
    }
}

