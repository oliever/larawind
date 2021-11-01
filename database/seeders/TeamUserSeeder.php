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
                'role'           => 'admin',
            ],
            [
                'id'             => 2,
                'team_id'        => 1,
                'user_id'        => 2,
                'role'           => 'admin',
            ],
            [
                'id'             => 3,
                'team_id'        => 1,
                'user_id'        => 3,
                'role'           => 'editor',
            ],
            [
                'id'             => 4,
                'team_id'        => 1,
                'user_id'        => 4,
                'role'           => 'editor',
            ],
            [
                'id'             => 5,
                'team_id'        => 1,
                'user_id'        => 5,
                'role'           => 'editor',
            ],
        ];

        TeamUser::insert($teamUsers);
    }
}
