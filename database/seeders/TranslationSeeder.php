<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Translation::insert(TranslationSeeder::defaults('kaizen_general'));
        Translation::insert(TranslationSeeder::defaults('kaizen_just_do_it'));
        Translation::insert(TranslationSeeder::defaults('kaizen_rapid'));
    }

    public static function defaults($section){
        switch ($section) {
            case 'kaizen_general':
                return [
                    ['team_id'=>1 ,'section'=>'kaizen_general','field'=>    'name',                 'value'=>   'Kaizen Name'],
                    ['team_id'=>1 ,'section'=>'kaizen_general','field'=>    'date_assigned',        'value'=>   'Date Assigned'],
                    ['team_id'=>1 ,'section'=>'kaizen_general','field'=>    'completion',           'value'=>   'Completion'],
                    ['team_id'=>1 ,'section'=>'kaizen_general','field'=>    'just_do_it',           'value'=>   'Just do it'],
                    ['team_id'=>1 ,'section'=>'kaizen_general','field'=>    'rapid',                'value'=>   'Rapid'],
                    ['team_id'=>1 ,'section'=>'kaizen_general','field'=>    'head_office_input',    'value'=>   'Head Office Input'],
                    ['team_id'=>1 ,'section'=>'kaizen_general','field'=>    'handled_at_location',  'value'=>   'Handled at Store'],
                    ['team_id'=>1 ,'section'=>'kaizen_general','field'=>    'dollar_value',         'value'=>   'Dollar Value'],
                    ['team_id'=>1 ,'section'=>'kaizen_general','field'=>    'savings',              'value'=>   'Savings'],
                    ['team_id'=>1 ,'section'=>'kaizen_general','field'=>    'hours_saved',          'value'=>   'Hours Saved'],
                    ['team_id'=>1 ,'section'=>'kaizen_general','field'=>    'head_office_comment',  'value'=>   'Head Office Comment'],
                ];
                break;
            case 'kaizen_just_do_it':
                return [
                    ['team_id'=>1 ,'section'=>'kaizen_just_do_it','field'=>    'reason',        'value'=>   'Reason for Kaizen'],
                    ['team_id'=>1 ,'section'=>'kaizen_just_do_it','field'=>    'problem',       'value'=>   'Problem'],
                    ['team_id'=>1 ,'section'=>'kaizen_just_do_it','field'=>    'causes',        'value'=>   'Causes'],
                    ['team_id'=>1 ,'section'=>'kaizen_just_do_it','field'=>    'solution',      'value'=>   'Solution'],
                    ['team_id'=>1 ,'section'=>'kaizen_just_do_it','field'=>    'expected_result','value'=>  'Expected Result'],
                ];
                break;
            case 'kaizen_rapid':
                return [
                    ['team_id'=>1 ,'section'=>'kaizen_rapid','field'=>    'rapid_problem', 'value'=>   'Problem Description'],
                ];
                break;
            default:
                # code...
                break;
        }
    }
}
