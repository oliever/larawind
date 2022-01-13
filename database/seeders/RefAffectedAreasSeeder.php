<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\RefAffectedArea;

class RefAffectedAreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $refAffectedAreas = [
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

        RefAffectedArea::insert($refAffectedAreas);
    }
}
