<?php

use App\Models\Translation;
use Database\Seeders\TranslationSeeder;
use Carbon\Carbon;

if(!function_exists('t')){
    function t($section, $field){
        if($field == "")
                return "--blank field name--";

        $t = Translation::where(['team_id'=> auth()->user()->currentTeam->id,'section'=>$section,'field'=>$field])->first();

        if(!$t){

            foreach (TranslationSeeder::defaults($section) as $key => $value) {
                if($value['field'] == $field){
                    /* $t = Translation::create([
                        'team_id' => auth()->user()->currentTeam->id,
                        'section' => $section,
                        'field' => $field,
                        'value' => $value['value'],
                        'created_at' => Carbon::now()
                    ]);
                    return $t->value; */
                }
                    info($value['field']);
            }
            return '_'.$field.'_';
        }


        return $t->value;
    }
}

if(!function_exists('current_team_name')){
    function current_team_name(){
        return "Team";
    }
}
