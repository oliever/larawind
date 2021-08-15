<?php

namespace App\Http\Controllers;

use App\Models\Kaizen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
