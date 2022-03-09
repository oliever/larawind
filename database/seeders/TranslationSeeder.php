<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Translation;
use Carbon\Carbon;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *Carbon::now()
     * @return void
     */
    public function run()
    {
        Translation::insert(TranslationSeeder::defaults('dashboard'));
        Translation::insert(TranslationSeeder::defaults('kaizen_general'));
        Translation::insert(TranslationSeeder::defaults('kaizen_just_do_it'));
        Translation::insert(TranslationSeeder::defaults('kaizen_rapid'));
        Translation::insert(TranslationSeeder::defaults('kaizen_custom_field'));
        Translation::insert(TranslationSeeder::defaults('project_custom_field'));

        Translation::insert(TranslationSeeder::arMetals('dashboard'));
        Translation::insert(TranslationSeeder::arMetals('kaizen_general'));
        Translation::insert(TranslationSeeder::arMetals('kaizen_just_do_it'));
        Translation::insert(TranslationSeeder::arMetals('kaizen_rapid'));
        Translation::insert(TranslationSeeder::arMetals('kaizen_custom_field'));
        Translation::insert(TranslationSeeder::arMetals('project_custom_field'));
    }

    public static function defaults($section){//Nutters
        switch ($section) {
            case 'dashboard':
                return [
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'dashboard','field'=>    'top_location_kaizen', 'value'=>   'Top Stores (Kaizen)'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'dashboard','field'=>    'top_location_project', 'value'=>   'Top Stores (Project)'],
                ];
                break;
            case 'kaizen_general':
                return [
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'location',             'value'=>   'Store'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'name',                 'value'=>   'Kaizen Name'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'date_assigned',        'value'=>   'Date Assigned'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'completion',           'value'=>   'Completion %'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'just_do_it',           'value'=>   'Just do it'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'rapid',                'value'=>   'Rapid Kaizen'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'head_office_input',    'value'=>   'Head Office Input'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'handled_at_location',  'value'=>   'Handled at Store'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'dollar_value',         'value'=>   'Total Cost of Solution'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'savings',              'value'=>   'Net Savings'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'hours_saved',          'value'=>   'Hours Saved'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'head_office_comment',  'value'=>   'Head Office Comment'],
                ];
                break;
            case 'kaizen_just_do_it':
                return [
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_just_do_it','field'=>    'reason',        'value'=>   'Reason for Kaizen'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_just_do_it','field'=>    'problem',       'value'=>   'Problem'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_just_do_it','field'=>    'causes',        'value'=>   'Causes'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_just_do_it','field'=>    'solution',      'value'=>   'Solution'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_just_do_it','field'=>    'expected_result','value'=>  'Expected Result'],
                ];
                break;
            case 'kaizen_rapid':
                return [
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_rapid','field'=>    'rapid_problem', 'value'=>   'Problem Description'],
                ];
                break;
            case 'kaizen_custom_field':
                return [
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_custom_field','field'=>    'custom_field_01', 'value'=>   'Custom Field 1'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_custom_field','field'=>    'custom_field_02', 'value'=>   'Custom Field 2'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_custom_field','field'=>    'custom_field_03', 'value'=>   'Custom Field 3'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'kaizen_custom_field','field'=>    'custom_field_04', 'value'=>   'Custom Field 4'],
                ];
                break;
            case 'project_custom_field':
                return [
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'project_custom_field','field'=>    'custom_field_01', 'value'=>   'Custom Field 1'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'project_custom_field','field'=>    'custom_field_02', 'value'=>   'Custom Field 2'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'project_custom_field','field'=>    'custom_field_03', 'value'=>   'Custom Field 3'],
                    ['team_id'=>1 ,'created_at'=>carbon::now(),'section'=>'project_custom_field','field'=>    'custom_field_04', 'value'=>   'Custom Field 4'],
                ];
                break;
            default:
                # code...
                break;
        }
    }

    public static function arMetals($section){//2
        switch ($section) {
            case 'dashboard':
                return [
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'dashboard','field'=>    'top_location_kaizen', 'value'=>   'Top Locations (Kaizen)'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'dashboard','field'=>    'top_location_project', 'value'=>   'Top Locations (Project)'],
                ];
                break;
            case 'kaizen_general':
                return [
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'location',             'value'=>   'Location'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'name',                 'value'=>   'Kaizen Name'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'date_assigned',        'value'=>   'Date Assigned'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'completion',           'value'=>   'Completion'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'just_do_it',           'value'=>   'Just do it'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'rapid',                'value'=>   'Rapid'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'head_office_input',    'value'=>   'Head Office Input'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'handled_at_location',  'value'=>   'Handled at Machine Center'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'dollar_value',         'value'=>   'Dollar Value'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'savings',              'value'=>   'Savings'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'hours_saved',          'value'=>   'Hours Saved'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_general','field'=>    'head_office_comment',  'value'=>   'Head Office Comment'],
                ];
                break;
            case 'kaizen_just_do_it':
                return [
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_just_do_it','field'=>    'reason',        'value'=>   'Reason for Kaizen'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_just_do_it','field'=>    'problem',       'value'=>   'Problem'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_just_do_it','field'=>    'causes',        'value'=>   'Causes'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_just_do_it','field'=>    'solution',      'value'=>   'Solution'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_just_do_it','field'=>    'expected_result','value'=>  'Expected Result'],
                ];
                break;
            case 'kaizen_rapid':
                return [
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_rapid','field'=>    'rapid_problem', 'value'=>   'Problem Description'],
                ];
                break;
            case 'kaizen_custom_field':
                return [
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_custom_field','field'=>    'custom_field_01', 'value'=>   'Custom Field 1'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_custom_field','field'=>    'custom_field_02', 'value'=>   'Custom Field 2'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_custom_field','field'=>    'custom_field_03', 'value'=>   'Custom Field 3'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'kaizen_custom_field','field'=>    'custom_field_04', 'value'=>   'Custom Field 4'],
                ];
                break;
            case 'project_custom_field':
                return [
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'project_custom_field','field'=>    'custom_field_01', 'value'=>   'Custom Field 1'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'project_custom_field','field'=>    'custom_field_02', 'value'=>   'Custom Field 2'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'project_custom_field','field'=>    'custom_field_03', 'value'=>   'Custom Field 3'],
                    ['team_id'=>2 ,'created_at'=>carbon::now(),'section'=>'project_custom_field','field'=>    'custom_field_04', 'value'=>   'Custom Field 4'],
                ];
                break;
            default:
                # code...
                break;
        }
    }
}
