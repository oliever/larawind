@extends ('layouts.pdf-kaizen')
<div style="text-align: center;">

	<h1><img width="200" src="photos/_nutters-logo.jpg" alt=""><br>
        <span>
        Kaizen Project Form #{{$project->id}}</span> </h1>
</div>
<div class="mt-10">
<center ><i>--- Under construction ---</i></center>
</div>
<div>
    <table style="border: none">
        <tr>
            <td colspan="4" class="section-header">KAIZEN PROJECT FORM</td>
        </tr>
        <tr >
            <td colspan="2" style="padding: 10 0">Description: <strong>{{$project->description}}</strong> </td>
            <td style="width: 20%">Date: <strong>{{Carbon\Carbon::create($project->posted)->toFormattedDateString()}}</strong></td>
            <td style="width: 30%">Store Name: <strong>{{$project->location->name}}</strong></td>
        </tr>

    </table>

</div>
