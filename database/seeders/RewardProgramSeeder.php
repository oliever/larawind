<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RewardProgram;

class RewardProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rewardPrograms = [
            [
                'name'  =>'Approved Rapid Kaizen',
                'points'  => 2
            ],
            [
                'name'  =>'Approved Just do it Kaizen',
                'points'  => 1
            ],
        ];
        RewardProgram::insert($rewardPrograms);
    }
}
