<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arMetalsDepartments = [
            [
                'team_id'        => 2,
                'name'           => 'Administration',
            ],
            [
                'team_id'        => 2,
                'name'           => 'General Production',
            ],
            [
                'team_id'        => 2,
                'name'           => 'Maintenance',
            ],
            [
                'team_id'        => 2,
                'name'           => 'Muffler Shields',
            ],
            [
                'team_id'        => 2,
                'name'           => 'Polish',
            ],
            [
                'team_id'        => 2,
                'name'           => 'Shipping',
            ],
            [
                'team_id'        => 2,
                'name'           => 'Welders',
            ],
        ];
        Department::insert($arMetalsDepartments);
    }
}
