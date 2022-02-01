<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Location;

class TopStats extends Component
{
    public function render()
    {
        $data = [];
        $data['top_kaizen_stores'] = [];//Location::withCount('kaizens')->orderBy('kaizens_count','desc')->get()->take(3);
        $data['top_project_stores'] = [];//Location::withCount('projects')->orderBy('projects_count','desc')->get()->take(3);
        foreach (Location::withCount('kaizens')->orderBy('kaizens_count','desc')->get()->take(3) as $location) {

            //info($location);
            //info($location->kaizens()->get());
        }
        foreach (Location::withCount('projects')->orderBy('projects_count','desc')->get()->take(3) as $location) {

            //info($location);
            //info($location->kaizens()->get());
        }
        return view('livewire.dashboard.top-stats', ['data'=>$data]);
    }
}
