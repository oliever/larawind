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
        $departments = [
            [
                'id'             => 2,
                'name'           => '',
            ],
            [
                'id'             => 3,
                'name'           => '',
            ],
            [
                'id'             => 4,
                'name'           => '',
            ],
            [
                'id'             => 5,
                'name'           => '',
            ],
            [
                'id'             => 7,
                'name'           => '',
            ],
            [
                'id'             => 8,
                'name'           => '',
            ],
            [
                'id'             => 9,
                'name'           => '',
            ],
            [
                'id'             => 10,
                'name'           => '',
            ],
            [
                'id'             => 11,
                'name'           => '',
            ],
            [
                'id'             => 12,
                'name'           => '',
            ],
            [
                'id'             => 13,
                'name'           => '',
            ],
            [
                'id'             => 14,
                'name'           => '',
            ],
            [
                'id'             => 15,
                'name'           => '',
            ],
            [
                'id'             => 16,
                'name'           => '',
            ],
            [
                'id'             => 17,
                'name'           => '',
            ],
            [
                'id'             => 18,
                'name'           => '',
            ],
        ];
        Department::insert($departments);
    }
}
