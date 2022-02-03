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
    <table style="border: solid 1px">
        <tr>
            <td colspan="2" class="section-header"><strong> KAIZEN PROJECT FORM</strong></td>
        </tr>
        <tr>
            <td style="vertical-align: top; width: 55%;">
                <table style="border: solid 1px">
                    <tr><td>Description: <strong>{{$project->description}}</strong></td></tr>
                    <tr><td>Project Leader/Manager: <strong>{{$project->manager ? $project->manager->name : ""}}</strong></td></tr>
                    <tr><td>Sponsor: <strong>{{$project->sponsor ? $project->sponsor->name  : ""}}</strong></td></tr>
                    <tr><td>Champion: <strong>{{$project->champion ? $project->champion->name  : ""}}</strong></td></tr>
                    <tr><td>Primary team:<br>
                        @foreach ($project->members()->get() as $member)
                            <strong style="margin-left: 10px;">{{ $member->name }}</strong><br>
                        @endforeach</td></tr>
                    @if (auth()->user()->currentTeam->id == 1)
                    <tr>
                        <td colspan="3" >Stores: <br>
                            @if($project->all_locations)
                                <strong style="margin-left: 10px;">All {{ Str::plural(t('kaizen_general','location'))}}</strong>
                            @else
                                @foreach ($project->locations()->get() as $store)
                                    <strong style="margin-left: 10px;">{{ $store->name }}</strong><br>
                                @endforeach
                            @endif

                        </td>
                    </tr>
                    @endif
                </table>
            </td>
            <td style="vertical-align: top;">
                <table style="border: solid 1px">
                    <tr><td>Date: <strong style="float: right">{{Carbon\Carbon::create($project->posted)->toFormattedDateString()}}</strong></td></tr>
                    <tr><td>Identified Loss: <strong style="float: right">{{ $project->loss ? $project->loss: "" }}</strong></td></tr>
                    <tr><td>Available Budget: <strong style="float: right">{{ $project->budget ? $project->budget: "" }}</strong></td></tr>
                    <tr><td>Potential Hours: <strong style="float: right">{{ $project->hours ? $project->hours . ' hrs' : ""}}</strong></td></tr>
                    <tr><td>Potential Savings: <strong style="float: right">{{ $project->savings ? $project->savings: "" }}</strong></td></tr>
                    <tr><td>Material Savings ($): <strong style="float: right">{{ $project->material_savings_dollar ? $project->material_savings_dollar: "" }}</strong></td></tr>
                    <tr><td>Machine Hours Savings: <strong style="float: right">{{ $project->machine_hours_savings ? $project->machine_hours_savings: "" }}</strong></td></tr>
                    <tr><td>Other Savings (Name): <strong style="float: right">{{ $project->other_savings_name ? $project->other_savings_name: "" }}</strong></td></tr>
                    <tr><td>Other Savings ($): <strong style="float: right">{{ $project->other_savings_dollar ? $project->other_savings_dollar: "" }}</strong></td></tr>
                    <tr><td>Start Date: <strong style="float: right">{{$project->start->format('M d, Y')}}</strong></td></tr>
                    <tr><td>End Date: <strong style="float: right">{{$project->end->format('M d, Y')}}</strong></td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="border: solid 1px">
                    <tr>
                        <td style="width: 40%">
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
                        <td style="width: 20%">
                            Status: <strong>{{$project->status}}</strong>
                        </td>
                        <td style="text-align: right">
                            Completion: <strong>{{$project->completion}} %</strong>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    @if (auth()->user()->currentTeam->id == 2)
        <table style="border: none">
            <tr>
                <td colspan="4" class="section-header"><strong>Departments</strong></td>
            </tr>
            @foreach($departments as $department)
                <tr>
                    @foreach($department as $departmentInner)
                    <td style="width: 25%">
                        <span>
                            <input style="vertical-align: middle" type="checkbox"
                            @isset($selectedDepartments[$departmentInner['id']])
                            checked
                            @endisset
                            />
                            <span style="vertical-align: middle">
                                {{ $departmentInner['name']}}
                            </span>
                        </span>
                    </td>
                    @endforeach
                </tr>
            @endforeach
        </table>
    @endif
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

    <table style="font-size: 0.8em">
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
                        <td>Dollar Savings: <strong style="float: right; padding-right: 10px">{{$project->savings_actual ? $project->savings_actual : ""}}</strong></td>
                        <td>Validated By: <strong style="float: right">{{$project->actuAlsavingsValidator ? $project->actuAlsavingsValidator->name : ""}}</strong></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


</div>
