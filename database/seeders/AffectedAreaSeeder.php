<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AffectedArea;

class AffectedAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nuttersAffectedAreas = [
            [
                'team_id'        => 1,
                'name'           => 'People'
            ],
            [
                'team_id'        => 1,
                'name'           => 'Safety'
            ],
            [
                'team_id'        => 1,
                'name'           => 'Cost/buying'
            ],
            [
                'team_id'        => 1,
                'name'           => 'Policy/Procedure'
            ],
            [
                'team_id'        => 1,
                'name'           => 'Order'
            ],
            [
                'team_id'        => 1,
                'name'           => 'Warehouse'
            ],
            [
                'team_id'        => 1,
                'name'           => 'Inventory'
            ],
            [
                'team_id'        => 1,
                'name'           => 'Margin'
            ],
            [
                'team_id'        => 1,
                'name'           => 'Pricing'
            ],
            [
                'team_id'        => 1,
                'name'           => 'Cost'
            ],
            [
                'team_id'        => 1,
                'name'           => 'Head Office'
            ],
            [
                'team_id'        => 1,
                'name'           => 'Receiving'
            ],
            [
                'team_id'        => 1,
                'name'           => 'All Stores'
            ],
            [
                'team_id'        => 1,
                'name'           => 'Technology'
            ],

        ];

        AffectedArea::insert($nuttersAffectedAreas);

        $arMetalsAffectedAreas = [
            [
                'team_id'        => 2,
                'name'           => 'People'
            ],
            [
                'team_id'        => 2,
                'name'           => 'Safety'
            ],
            [
                'team_id'        => 2,
                'name'           => 'Cost/buying'
            ],
            [
                'team_id'        => 2,
                'name'           => 'Policy/Procedure'
            ],
        ];

        AffectedArea::insert($arMetalsAffectedAreas);
    }
}
