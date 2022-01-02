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
            SystemSettingSeeder::class,
            TranslationSeeder::class,
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            LocationsSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            RefAffectedAreasSeeder::class,
            RoleUserTableSeeder::class,
            TeamsTableSeeder::class,
            TeamUserSeeder::class,
            EmployeeSeeder::class,
            RewardSeeder::class,
            RewardProgramSeeder::class,

        ]);
    }
}

/* php artisan migrate:fresh --seed */
/* php artisan storage:link */
/* composer dump-autoload */
