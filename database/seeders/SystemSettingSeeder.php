<?php

namespace Database\Seeders;
use App\Models\SystemSetting;

use Illuminate\Database\Seeder;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Nutters
        $systemmSettings1 = [
            [
                'team_id'   =>  1,
                'code'      =>  'field_kaizen_dollar_value'
            ]
        ];
    }
}
