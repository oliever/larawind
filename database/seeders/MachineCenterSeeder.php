<?php

namespace Database\Seeders;

use App\Models\MachineCenter;
use Illuminate\Database\Seeder;

class MachineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $machineCenters = [
            'team_id' => 2,
            'name'      => 'Machine Center 1'
        ];

        MachineCenter::insert($machineCenters);
    }
}
