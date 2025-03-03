<?php

namespace App\Http\Controllers;

use App\Models\Kaizen;
use App\Models\Employee;
use App\Models\RefAffectedArea;
use App\Models\Photo;
use App\Models\Location;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class KaizenController extends Controller
{
    public function index()
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
        return view('kaizen.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $employee = null;
        if(auth()->user()->shared)
            $employee = Employee::where('id', $request->cookie('selected_employee'))->first();
        return view('kaizen.create',compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        info($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kaizen  $kaizen
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Kaizen $kaizen)
    {
       /*  info($kaizen); */
       $employee = null;
        if(auth()->user()->shared)
            $employee = Employee::where('id', $request->cookie('selected_employee'))->first();
        return view('kaizen.show',compact('employee','kaizen'));

    }
    public function pdf(Kaizen $kaizen)
    {
        $data['kaizen'] = $kaizen;
        $data['affectedAreas'] = array_chunk(RefAffectedArea::where(['team_id'=>auth()->user()->currentTeam->id])->get()->toArray(),4);
        $data['selectedAffectedAreas'] = array_fill_keys(explode(",", $kaizen->affected_areas),'checked');

        $data['mainPhotos']= [];
        foreach(Photo::where(['type'=>'main', 'model'=>get_class(new Kaizen()), 'model_id'=>$kaizen->id])->get() as $savedPhoto){
            $data['mainPhotos'][$savedPhoto->id] = $savedPhoto;
        }

        $data['afterPhotos']= [];
        foreach(Photo::where(['type'=>'after', 'model'=>get_class(new Kaizen()), 'model_id'=>$kaizen->id])->get() as $savedPhoto){
            $data['afterPhotos'][$savedPhoto->id] = $savedPhoto;
        }

        /* if(isset($data['photos']))
            $data['photos'] = array_chunk($data['photos'], 2);//chunk into 2 for layout
        else
            $data['photos'] = [];

        $data['before_photos'] = [];
        foreach(Photo::where(['type'=>'before', 'model'=>get_class(new Kaizen()), 'model_id'=>$kaizen->id])->get() as $savedPhoto){
            $data['before_photos'][$savedPhoto->id] = $savedPhoto;
        }
        $data['after_photos'] = [];
        foreach(Photo::where(['type'=>'after', 'model'=>get_class(new Kaizen()), 'model_id'=>$kaizen->id])->get() as $savedPhoto){
            $data['after_photos'][$savedPhoto->id] = $savedPhoto;
        } */

        $selectedUsers = [];
        foreach(explode(",", $kaizen->members) as $key=>$value){
            //replace keys (index) with values from db
            $selectedUsers[] = User::where(['id' => $value])->first() ;
        }
        $data['team_members'] = $selectedUsers;

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('kaizen.pdf.nutters', $data);
        $format = '%s_%s_%s.pdf';
        return $pdf->stream(sprintf($format, $kaizen->id, $kaizen->name, $kaizen->posted_at));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kaizen  $kaizen
     * @return \Illuminate\Http\Response
     */
    public function edit(Kaizen $kaizen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kaizen  $kaizen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kaizen $kaizen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kaizen  $kaizen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kaizen $kaizen)
    {
        //
    }
}
