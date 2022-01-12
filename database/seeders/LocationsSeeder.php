<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
use Carbon\Carbon;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nuttersLocations = [

            [
                'id'             => 1,
                'team_id'        => 1,
                'code'           => "1",
                'name'           => 'Medicine Hat',
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 3,
                'team_id'        => 1,
                'code'           => "3",
                'name'           => 'Red Deer',
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 5,
                'team_id'        => 1,
                'code'           => "5",
                'name'           => "Moose Jaw",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 6,
                'team_id'        => 1,
                'code'           => "6",
                'name'           => "Lethbridge",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 10,
                'team_id'        => 1,
                'code'           => "10",
                'name'           => "Lloydminster",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 28,
                'team_id'        => 1,
                'code'           => "28",
                'name'           => "Jasper",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 38,
                'team_id'        => 1,
                'code'           => "38",
                'name'           => "Okotoks",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 44,
                'team_id'        => 1,
                'code'           => "44",
                'name'           => "Canmore",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 45,
                'team_id'        => 1,
                'code'           => "45",
                'name'           => "Camrose",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 47,
                'team_id'        => 1,
                'code'           => "47",
                'name'           => "Swift Current",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 48,
                'team_id'        => 1,
                'code'           => "48",
                'name'           => "Saskatoon",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 50,
                'team_id'        => 1,
                'code'           => "50",
                'name'           => "Airdrie",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 999,
                'team_id'        => 1,
                'code'           => "999",
                'name'           => "Head Office",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 998,
                'team_id'        => 1,
                'code'           => "998",
                'name'           => "Warehouse",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 997,
                'team_id'        => 1,
                'code'           => "997",
                'name'           => "Specialty",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 99
            ],
            [
                'id'             => 99,
                'team_id'        => 1,
                'code'           => "99",
                'name'           => 'All Stores',
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => true,
                'is_corporate'   => true,
                'area_id'        => null
            ],
        ];

        Location::insert($nuttersLocations);

        $arMetalsLocations = [
            /* [
                'id'             => 100,
                'team_id'        => 2,
                'code'           => "100",
                'name'           => 'AR Metals Admin Office',
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 199
            ], */
            [
                'id'             => 101,
                'team_id'        => 2,
                'code'           => "101",
                'name'           => 'AR Metals',
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'is_corporate'   => true,
                'area_id'        => 199
            ],
        ];

        Location::insert($arMetalsLocations);
    }
}
