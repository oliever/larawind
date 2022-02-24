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
        $systemmSettings_nutters = [
            [
                'team_id'   =>  1,
                'code'      =>  'custom_section_position_kaizen',
                'value'     =>  'before_reason'//hidden, before_reason, after_reason
            ],
            [
                'team_id'   =>  1,
                'code'      =>  'custom_section_position_project',
                'value'     =>  'before_reason'//hidden, before_reason, after_reason
            ],
            [
                'team_id'   =>  1,
                'code'      =>  'dashboard_kaizen_column_location',
                'value'     =>  '1'
            ],
            [
                'team_id'   =>  1,
                'code'      =>  'dashboard_kaizen_column_head_office_input',
                'value'     =>  '1'
            ],
            [
                'team_id'   =>  1,
                'code'      =>  'dashboard_kaizen_column_handle_at_location',
                'value'     =>  '1'
            ],
            [
                'team_id'   =>  1,
                'code'      =>  'dashboard_kaizen_column_process_step',
                'value'     =>  '0'
            ],
            [
                'team_id'   =>  1,
                'code'      =>  'dashboard_kaizen_column_machine_center',
                'value'     =>  '0'
            ],
            [
                'team_id'   =>  1,
                'code'      =>  'dashboard_kaizen_column_department',
                'value'     =>  '0'
            ],
        ];

        SystemSetting::insert($systemmSettings_nutters);

        //AR Metals
        $systemmSettings_arMetals = [
            [
                'team_id'   =>  2,
                'code'      =>  'custom_section_position_kaizen',
                'value'     =>  'before_reason'//hidden, before_reason, after_reason
            ],
            [
                'team_id'   =>  2,
                'code'      =>  'custom_section_position_project',
                'value'     =>  'before_reason'//hidden, before_reason, after_reason
            ],
            [
                'team_id'   =>  2,
                'code'      =>  'dashboard_kaizen_column_location',
                'value'     =>  '0'
            ],
            [
                'team_id'   =>  2,
                'code'      =>  'dashboard_kaizen_column_head_office_input',
                'value'     =>  '0'
            ],
            [
                'team_id'   =>  2,
                'code'      =>  'dashboard_kaizen_column_handle_at_location',
                'value'     =>  '0'
            ],
            [
                'team_id'   =>  2,
                'code'      =>  'dashboard_kaizen_column_process_step',
                'value'     =>  '1'
            ],
            [
                'team_id'   =>  2,
                'code'      =>  'dashboard_kaizen_column_machine_center',
                'value'     =>  '1'
            ],
            [
                'team_id'   =>  2,
                'code'      =>  'dashboard_kaizen_column_department',
                'value'     =>  '1'
            ],
        ];

        SystemSetting::insert($systemmSettings_arMetals);
    }
}
