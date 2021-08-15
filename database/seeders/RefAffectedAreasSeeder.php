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
                'name'           => 'People',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'Safety',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'Cost/buying',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'Policy/Procedure',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'Order',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'Warehouse',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'Inventory',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'Margin',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'Pricing',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'Cost',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'Head Office',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'Receiving',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'All Stores',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'Technology',
                'created_at'     => Carbon::now()
            ],
            [
                'team_id'        => 1,
                'name'           => 'Other',
                'created_at'     => Carbon::now()
            ],
        ];

        RefAffectedArea::insert($refAffectedAreas);
    }
}
