<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Translation;
use App\Models\Team;
use Carbon\Carbon;

use Database\Seeders\TranslationSeeder;

class SystemSettingsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(auth()->user()->level != "super_admin", Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->seedTranslations();
        $translations = Translation::where('team_id',auth()->user()->currentTeam->id)->get()->toArray();
        return view('system-settings.index', compact('translations'));
    }

    private function seedTranslations(){
        $defaults = array_merge(TranslationSeeder::defaults('kaizen_general'),TranslationSeeder::defaults('kaizen_just_do_it'),TranslationSeeder::defaults('kaizen_rapid'));
        foreach ($defaults as $key => $default) {
            if(!Translation::where(['team_id'=>auth()->user()->currentTeam->id,'section'=>$default['section'],'field'=>$default['field']])->first())
                Translation::create([
                    'team_id' => auth()->user()->currentTeam->id,
                    'section' => $default['section'],
                    'field' => $default['field'],
                    'value' => $default['value'],
                    'created_at' => Carbon::now()
                ]);
        }
    }

    public function changeTeam(Request $request){
        abort_if(auth()->user()->level != "super_admin", Response::HTTP_FORBIDDEN, '403 Forbidden');
        $teams = Team::get();
        return view('system-settings.change-team', compact('teams'));
    }
}
