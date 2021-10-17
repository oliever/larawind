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
            <td colspan="4" class="section-header"><strong> KAIZEN PROJECT FORM</strong></td>
        </tr>
        <tr >
            <td colspan="3" >Description: <strong>{{$project->description}}</strong> </td>
            <td style="width: 30%">Date: <strong style="float: right">{{Carbon\Carbon::create($project->posted)->toFormattedDateString()}}</strong></td>
        </tr>

        <tr>
            <td colspan="3">
                Project Leader/Manager: <strong>{{$project->manager ? $project->manager->name : ""}}</strong>
            </td>
            <td>
                Identified Loss: <strong style="float: right">{{ $project->loss ? '$ '. $project->loss: "" }}</strong>
            </td>
        </tr>
        <tr>
            <td  colspan="3">Sponsor: <strong>{{$project->sponsor ? $project->sponsor->name  : ""}}</strong></td>
            <td>
                Available Budget: <strong style="float: right">{{ $project->budget ? '$ '. $project->budget: "" }}</strong>
            </td>
        </tr>
        <tr>
            <td colspan="3">Champion: <strong>{{$project->champion ? $project->champion->name  : ""}}</strong></td>
            <td>
                Potential Hours: <strong style="float: right">{{ $project->hours ? $project->hours . ' hrs' : ""}}</strong>
            </td>
        </tr>

        <tr>
            <td colspan="3">
                Primary team: <strong>{{$project->primary_team}}</strong>
            </td>
            <td>
                Potential Savings: <strong style="float: right">{{ $project->savings ? '$ '. $project->savings: "" }}</strong>
            </td>
        </tr>
        <tr>
            <td colspan="3" >Stores: <br>
                @if($project->all_locations)
                    <strong>All Stores</strong>
                @else
                    @foreach ($project->locations()->get() as $store)
                        <strong style="margin-left: 10px;">{{ $store->name }}</strong><br>
                    @endforeach
                @endif

            </td>
            <td style="width: 29%">
                <table>
                    <tr><td>Start Date: <strong style="float: right">{{$project->start->format('M d, Y')}}</strong></td></tr>
                    <tr><td>End Date: <strong style="float: right">{{$project->end->format('M d, Y')}}</strong></td></tr>
                </table>

            </td>
            {{-- <td style="width: 29%">
                Start Date: <strong>{{Carbon\Carbon::create($project->start)->toFormattedDateString()}}</strong>
            </td>
            <td>
                End Date: <strong>{{Carbon\Carbon::create($project->end)->toFormattedDateString()}}</strong>
            </td> --}}
        </tr>

        <tr>
            <td colspan="2">
                <input style="vertical-align: middle" type="checkbox"
                @if ($project->capex)
                checked
                @endif
                />
                <span style="vertical-align: middle; margin-right: 10px" >Capex</span>

                <input style="vertical-align: middle" type="checkbox"
                @if (!$project->capex)
                checked
                @endif
                />
                <span style="vertical-align: middle">Non-capex</span>
            </td>
            <td>
                Status: <strong>{{$project->status}}</strong>
            </td>
            <td>
                Completion: <strong>{{$project->completion}} %</strong>
            </td>
        </tr>

    </table>
    <table style="border: none">
        <tr>
            <td colspan="4" class="section-header"><strong>AFFECTED AREAS</strong></td>
        </tr>
        @foreach($affectedAreas as $affectedArea)
            <tr>
                @foreach($affectedArea as $affectedAreaInner)
                <td style="width: 25%">
                    <span>
                        <input style="vertical-align: middle" type="checkbox"
                        @isset($selectedAffectedAreas[$affectedAreaInner['id']])
                        checked
                        @endisset
                        />
                        <span style="vertical-align: middle">
                            {{ $affectedAreaInner['name']}}
                        </span>
                    </span>
                </td>
                @endforeach
            </tr>
        @endforeach
        @if ($project->other_affected_area)
            <tr>
                <td colspan="4" style="padding-bottom: 20px;">
                    <i>Other:</i>  {{$project->other_affected_area}}
                </td>
            </tr>
        @endif
    </table>
    <table>
        <tr>
            <td colspan="2" class="input-header">Primary Metric</td>
            <td colspan="2" class="input-header">Deliverables</td>
        </tr>
        <tr>
            <td  colspan="2" >{{$project->metric}}</td>
            <td  colspan="2">{{$project->deliverables}}</td>
        </tr>
        <tr>
            <td colspan="2" class="input-header">Scope</td>
            <td colspan="2" class="input-header">Major Risks</td>
        </tr>
        <tr>
            <td  colspan="2">{{$project->scope}}</td>
            <td  colspan="2">{{$project->risks}}</td>
        </tr>
        <tr>
            <td colspan="4" class="input-header">Comments</td>
        </tr>
        <tr>
            <td  colspan="4">{{$project->comments}}</td>
        </tr>
    </table>

    <table style="font-size: 0.9em">
        <tr>
            <td>
                <table style="border: none">
                    <tr>
                        <td class="section-header"><strong>PROJECT APPROVAL</strong></td>
                    </tr>
                    <tr><td>Approving Leader/Manager: <strong style="float: right; padding-right: 5px">{{$project->approvedManager ? $project->approvedManager->name : ""}}</strong></td></tr>
                    <tr><td>Approving Sponsor: <strong style="float: right; padding-right: 5px">{{$project->approvedSponsor ? $project->approvedSponsor->name : ""}}</strong></td></tr>
                    <tr><td>Approving Champion: <strong style="float: right; padding-right: 5px">{{$project->approvedChampion ? $project->approvedChampion->name : ""}}</strong></td></tr>
                </table>
            </td>
            <td style="vertical-align: top;">
                <table style="border: none">
                    <tr>
                        <td colspan="2" class="section-header"><strong>ACTUAL SAVINGS</strong></td>
                    </tr>
                    <tr>
                        <td >Hours Saved: <strong style="float: right; padding-right: 10px">{{$project->hours_actual ? $project->hours_actual . ' hrs' : ""}}</strong></td>
                        <td >Validated By: <strong style="float: right">{{$project->actuAlHoursValidator ? $project->actuAlHoursValidator->name : ""}}</strong></td>
                    </tr>
                    <tr>
                        <td>Dollar Savings: <strong style="float: right; padding-right: 10px">{{$project->savings_actual ? '$ '. $project->savings_actual : ""}}</strong></td>
                        <td>Validated By: <strong style="float: right">{{$project->actuAlsavingsValidator ? $project->actuAlsavingsValidator->name : ""}}</strong></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


</div>
