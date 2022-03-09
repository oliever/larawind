<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        /* $data = [];
        $data['top_kaizen_stores'] = Location::withCount('kaizens')->orderBy('kaizens_count','desc')->get()->take(3);
        $data['top_project_stores'] = Location::withCount('projects')->orderBy('projects_count','desc')->get()->take(3);
        foreach (Location::withCount('kaizens')->orderBy('kaizens_count','desc')->get()->take(3) as $location) {

            info($location->name);
            //info($location->kaizens()->get());
        }
        foreach (Location::withCount('projects')->orderBy('projects_count','desc')->get()->take(3) as $location) {

            info($location->name);
            //info($location->kaizens()->get());
        } */
        return view('dashboard'/* , ['data'=>$data] */);
    }
}
