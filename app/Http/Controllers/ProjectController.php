<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use Illuminate\Support\Facades\App;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.index');
    }

    public function create()
    {
        return view('project.create');
    }
    public function show(Project $project)
    {
       /*  info($kaizen); */
        return view('project.show',compact('project'));
    }
    public function pdf(Project $project)
    {
        $data['project'] = $project;
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('project.pdf.nutters', $data);
        $format = '%s_%s_%s.pdf';
        return $pdf->stream(sprintf($format, $project->id, $project->description, $project->posted_at));
    }
}
