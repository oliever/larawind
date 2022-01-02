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
                'code'      =>  'custom_section_position_kaizen',
                'value'     =>  'before_reason'//hidden, before_reason, after_reason
            ],
            [
                'team_id'   =>  1,
                'code'      =>  'custom_section_position_project',
                'value'     =>  'before_reason'//hidden, before_reason, after_reason
            ]
        ];

        SystemSetting::insert($systemmSettings1);
    }
}
