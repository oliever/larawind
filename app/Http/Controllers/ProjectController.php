<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Employee;
use App\Models\AffectedArea;
use Illuminate\Support\Facades\App;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.index');
    }

    public function create(Request $request)
    {
        $employee = null;
        if(auth()->user()->shared)
            $employee = Employee::where('id', $request->cookie('selected_employee'))->first();
        return view('project.create',compact('employee'));
    }
    public function show(Request $request, Project $project)
    {
        $employee = null;
        if(auth()->user()->shared)
            $employee = Employee::where('id', $request->cookie('selected_employee'))->first();
        return view('project.show',compact('employee','project'));
    }
    public function pdf(Project $project)
    {
        $data['project'] = $project;
        $data['affectedAreas'] = array_chunk(AffectedArea::where(['team_id'=>auth()->user()->currentTeam->id])->get()->toArray(),4);
        $data['selectedAffectedAreas'] = array_fill_keys(explode(",", $project->affected_areas),'checked');

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('project.pdf.nutters', $data);
        $format = '%s_%s_%s.pdf';
        return $pdf->stream(sprintf($format, $project->id, $project->description, $project->posted_at));
    }
}
