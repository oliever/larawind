<?php

use App\Models\SystemSetting;
use Carbon\Carbon;

/*Add as autoloadedd file on composer.json
* run composer dump-autoload
*/

if(!function_exists('settingsValue')){
    function settingsValue($code){
        info($code);
        $s = SystemSetting::where(['team_id'=> auth()->user()->currentTeam->id,'code'=>$code])->first();
        return $s->value;
    }
}
