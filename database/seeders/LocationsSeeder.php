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
        $locations = [

            [
                'id'             => 1,
                'team_id'        => 1,
                'code'           => "1",
                'name'           => 'Medicine Hat',
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
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
                'area_id'        => 99
            ],
            [
                'id'             => 9,
                'team_id'        => 1,
                'code'           => "9",
                'name'           => "Wetaskiwin",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
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
                'area_id'        => 99
            ],
            [
                'id'             => 12,
                'team_id'        => 1,
                'code'           => "12",
                'name'           => "Estevan",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'area_id'        => 99
            ],
            [
                'id'             => 14,
                'team_id'        => 1,
                'code'           => "14",
                'name'           => "Leduc",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'area_id'        => 99
            ],
            [
                'id'             => 15,
                'team_id'        => 1,
                'code'           => "15",
                'name'           => "Prince Albert",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'area_id'        => 99
            ],
            [
                'id'             => 21,
                'team_id'        => 1,
                'code'           => "21",
                'name'           => "Yorkton",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'area_id'        => 99
            ],
            [
                'id'             => 24,
                'team_id'        => 1,
                'code'           => "24",
                'name'           => "Rocky Mountain House",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'area_id'        => 99
            ],
            [
                'id'             => 25,
                'team_id'        => 1,
                'code'           => "25",
                'name'           => "Melfort",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
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
                'area_id'        => 99
            ],
            [
                'id'             => 31,
                'team_id'        => 1,
                'code'           => "31",
                'name'           => "North Battleford",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'area_id'        => 99
            ],
            [
                'id'             => 32,
                'team_id'        => 1,
                'code'           => "32",
                'name'           => "Olds",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'area_id'        => 99
            ],
            [
                'id'             => 35,
                'team_id'        => 1,
                'code'           => "35",
                'name'           => "Salmon Arm",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
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
                'area_id'        => 99
            ],
            [
                'id'             => 40,
                'team_id'        => 1,
                'code'           => "40",
                'name'           => "Dauphin",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
                'area_id'        => 99
            ],
            [
                'id'             => 43,
                'team_id'        => 1,
                'code'           => "43",
                'name'           => "Crankbrook",
                'active'         => true,
                'created_at'     => Carbon::now(),
                'is_area'        => false,
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
                'area_id'        => null
            ],
        ];

        Location::insert($locations);
    }
}
