<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamUser;

class TeamUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teamUsers = [
            [
                'id'             => 1,
                'team_id'        => 1,
                'user_id'        => 1,
                'role'           => 1,
            ],
            [
                'id'             => 2,
                'team_id'        => 1,
                'user_id'        => 2,
                'role'           => 2,
            ],
            [
                'id'             => 3,
                'team_id'        => 1,
                'user_id'        => 3,
                'role'           => 3,
            ],
            [
                'id'             => 4,
                'team_id'        => 1,
                'user_id'        => 4,
                'role'           => 4,
            ],
            [
                'id'             => 5,
                'team_id'        => 1,
                'user_id'        => 5,
                'role'           => 1,
            ],
        ];

        TeamUser::insert($teamUsers);
    }
}
