<?php

namespace App\Http\Controllers;

use App\Models\Kaizen;
use App\Models\RefAffectedArea;
use App\Models\Photo;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class KaizenController extends Controller
{
    public function index()
    {
        return view('kaizen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* $kaizen = Kaizen::create([
            'user_id' => Auth::user()->id,
            'location_id' => 1,

        ]); */
        return view('kaizen.create');
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
    public function show(Kaizen $kaizen)
    {
       /*  info($kaizen); */
        return view('kaizen.show',compact('kaizen'));
    }
    public function pdf(Kaizen $kaizen)
    {
        $data['kaizen'] = $kaizen;
        $data['affectedAreas'] = array_chunk(RefAffectedArea::where(['team_id'=>auth()->user()->currentTeam->id])->get()->toArray(),4);
        foreach(Photo::where(['type'=>'main', 'model'=>get_class(new Kaizen()), 'model_id'=>$kaizen->id])->get() as $savedPhoto){
            $data['photos'][$savedPhoto->id] = $savedPhoto;
        }
        $data['photos'] = array_chunk($data['photos'], 2);

        foreach(Photo::where(['type'=>'before', 'model'=>get_class(new Kaizen()), 'model_id'=>$kaizen->id])->get() as $savedPhoto){
            $data['before_photos'][$savedPhoto->id] = $savedPhoto;
        }
        foreach(Photo::where(['type'=>'after', 'model'=>get_class(new Kaizen()), 'model_id'=>$kaizen->id])->get() as $savedPhoto){
            $data['after_photos'][$savedPhoto->id] = $savedPhoto;
        }

        \PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif', 'isRemoteEnabledx' => true]);
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
