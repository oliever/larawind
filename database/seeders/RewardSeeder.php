<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reward;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rewards = [
            [
                'name'  =>'$25 Gift Card',
                'cost'  => 2
            ],
            [
                'name'  =>'$50 Gift Card',
                'cost'  => 4
            ],
        ];
        Reward::insert($rewards);
    }
}
