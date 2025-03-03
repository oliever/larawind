<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamsTableSeeder extends Seeder
{
    public function run()
    {
        $teams = [
            [
                'id'             => 1,
                'name'           => 'Nutters',
                'user_id'        => 1,
                'personal_team'  => 1,
            ],
            [
                'id'             => 2,
                'name'           => 'ABC',
                'user_id'        => 1,
                'personal_team'  => 1,
            ],
        ];

        Team::insert($teams);
    }
}

