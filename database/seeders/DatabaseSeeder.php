<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        //Team::factory(2)->create();
        $this->call([
            LocationsSeeder::class,
            PermissionRoleTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            RefAffectedAreasSeeder::class,
            RoleUserTableSeeder::class,
            TeamsTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
