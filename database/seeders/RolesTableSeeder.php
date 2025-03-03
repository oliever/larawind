<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'HeadOffice',
            ],
            [
                'id'    => 3,
                'title' => 'Manager',
            ],
            [
                'id'    => 4,
                'title' => 'User',
            ],
        ];

        Role::insert($roles);
    }
}
