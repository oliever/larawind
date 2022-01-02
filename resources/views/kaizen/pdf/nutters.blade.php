@extends ('layouts.pdf-kaizen')
<title>Kaizen Suggestion: {{$kaizen->name}}</title>

<div style="text-align: center;">

	<h1><img width="200" src="photos/_nutters-logo.jpg" alt=""><br>
        <span>
        @if ($kaizen->rapid)
            Rapid
        @elseif ($kaizen->just_do_it)
            Just Do It
        @endif
        Kaizen Suggestion Form #{{$kaizen->id}}</span> </h1>
</div>
<div class="mt-10">
<center ><i>--- Under construction ---</i></center>
</div>
<div>
    <table style="border: none">
        <tr>
            <td colspan="6" class="section-header">KAIZEN CONTINUOUS IMPROVEMENT SUGGESTION FORM</td>
        </tr>
        <tr>
            <td colspan="4"> <small>Kaizen Name:</small> <br> <strong>{{$kaizen->name}}</strong></td>
            <td><small>Date Assigned:</small> <br> <strong>{{Carbon\Carbon::create($kaizen->date_assigned)->toFormattedDateString()}}</strong></td>
            <td><small>Completion:</small> <br> <strong>{{$kaizen->completion}}%</strong></td>
        </tr>
        <tr>
            <td colspan="6">
                <table style="border: none">
                    <tr>
                        <td style="width: 120px"><span>
                            <input style="vertical-align: middle" type="checkbox" @if($kaizen->just_do_it) checked @endif/>
                            <span style="vertical-align: middle">Just Do It</span>
                        </span></td>
                        <td style="width: 150px"><span>
                            <input style="vertical-align: middle" type="checkbox" @if($kaizen->rapid) checked @endif/>
                            <span style="vertical-align: middle">Rapid Kaizen</span>
                        </span></td>
                        <td><span>
                            <input style="vertical-align: middle" type="checkbox" @if($kaizen->head_office_input) checked @endif/>
                            <span style="vertical-align: middle">Head Office Input</span>
                        </span></td>
                        <td><span>
                            <input style="vertical-align: middle" type="checkbox" @if($kaizen->handled_at_location) checked @endif/>
                            <span style="vertical-align: middle">Handle at Store Level</span>
                        </span></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <small>Team Members:</small><br>
                            @foreach ($kaizen->members()->get() as $member)
                                <strong>{{ $member->name }}</strong><br>
                            @endforeach
                        </td>
                        <td colspan="2" style="text-align: center">
                            <small>Stores:</small> <br>
                            @if($kaizen->all_locations)
                                <strong>All {{ Str::plural(t('kaizen_general','location'))}}</strong><br>
                            @else
                                @foreach ($kaizen->locations as $store)
                                    <strong>{{ $store->name }}</strong><br>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table style="border: none">
        <tr >
            <td colspan="6" class="section-header">AREAS AFFECTED</td>
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
        @if ($kaizen->other_affected_area)
            <tr>
                <td colspan="4" style="padding-bottom: 20px;">
                    <i>Other:</i>  {{$kaizen->other_affected_area}}
                </td>
            </tr>
        @endif

        <tr>
            <td colspan="4">
                <table style="border: none; text-align: center;">
                <tr>
                    <td><small>Dollar Value:</small> <br> <strong>{{$kaizen->dollar_value}}</strong></td>
                    <td><small>Savings:</small> <br> <strong>{{$kaizen->savings}}</strong></td>
                    <td><small>Hours Saved:</small> <br> <strong>{{$kaizen->hours_saved}}</strong></td>
                </tr></table>
            </td>

        </tr>

        @if ($kaizen->head_office_input)
            <tr>
                <td colspan="4" class="input-header">Head Office Comments</td>
            </tr>
            <tr>
                <td  colspan="4" style="padding-bottom: 20px;">{{$kaizen->head_office_comment}}</td>
            </tr>
        @endif

        @if ( settingsValue('custom_section_position_kaizen') == "before_reason" &&  $showCustomFields )
            <tr>
                <td colspan="2" class="input-header">{{$kaizen->custom_field_01_label}}</td>
                <td colspan="2" class="input-header">{{$kaizen->custom_field_02_label}}</td>
            </tr>
            <tr>
                <td  colspan="2">{{$kaizen->custom_field_01}}</td><td  colspan="2">{{$kaizen->custom_field_02}}</td>
            </tr>
            <tr>
                <td colspan="2" class="input-header">{{$kaizen->custom_field_03_label}}</td>
                <td colspan="2" class="input-header">{{$kaizen->custom_field_04_label}}</td>
            </tr>
            <tr>
                <td  colspan="2">{{$kaizen->custom_field_03}}</td><td  colspan="2">{{$kaizen->custom_field_04}}</td>
            </tr>
            <tr>
                <td><br/></td>
            </tr>
        @endif

        <tr>
            <td colspan="2" class="input-header">Reason For kaizen </td>
            <td colspan="2" class="input-header">Problem</td>
        </tr>
        <tr>
            <td  colspan="2">{{$kaizen->reason}}</td><td  colspan="2">{{$kaizen->problem}}</td>
        </tr>
        <tr>
            <td colspan="2" class="input-header">Causes</td>
            <td colspan="2" class="input-header">Solution</td>
        </tr>
        <tr>
            <td  colspan="2">{{$kaizen->causes}}</td><td  colspan="2">{{$kaizen->solution}}</td>
        </tr>
        <tr>
            <td colspan="4" class="input-header">Result</td>
        </tr>
        <tr>
            <td  colspan="4" style="padding-bottom: 20px;">{{$kaizen->expected_result}}</td>
        </tr>

        @if ( settingsValue('custom_section_position_kaizen') == "after_reason" &&  $showCustomFields )
            <tr>
                <td><br/></td>
            </tr>
            <tr>
                <td colspan="2" class="input-header">{{$kaizen->custom_field_01_label}}</td>
                <td colspan="2" class="input-header">{{$kaizen->custom_field_02_label}}</td>
            </tr>
            <tr>
                <td  colspan="2">{{$kaizen->custom_field_01}}</td><td  colspan="2">{{$kaizen->custom_field_02}}</td>
            </tr>
            <tr>
                <td colspan="2" class="input-header">{{$kaizen->custom_field_03_label}}</td>
                <td colspan="2" class="input-header">{{$kaizen->custom_field_04_label}}</td>
            </tr>
            <tr>
                <td  colspan="2">{{$kaizen->custom_field_03}}</td><td  colspan="2">{{$kaizen->custom_field_04}}</td>
            </tr>
        @endif


    </table>
    @if (!$kaizen->before_after)
        <div class="page-break"></div>
        <table>
            <tr> <td colspan="4" class="section-header"  >PHOTOS</td></tr>
            @foreach(array_chunk($mainPhotos, 2) as $photo)
            <tr>
                @foreach($photo as $photoInner)
                <td colspan="2">
                    <img style="width: 300px; padding: 10 15" class="mt-4" src="photos/{{ $photoInner['filename'] }}">
                </td>
                @endforeach
            </tr>
            @endforeach
        </table>
    @endif


    @if ($kaizen->before_after)
        <div class="page-break"></div>
        <table>
            <tr> <td colspan="4" class="section-header">BEFORE AND AFTER REPORT</td></tr>
            <tr> <td colspan="4" class="section-header"  >Before Photos</td></tr>
            @foreach(array_chunk($mainPhotos, 2) as $photo)
            <tr>
                @foreach($photo as $photoInner)
                <td colspan="2">
                    <img style="width: 300px; padding: 10 15" class="mt-4" src="photos/{{ $photoInner['filename'] }}">
                </td>
                @endforeach
            </tr>
            @endforeach
            <tr> <td colspan="4" class="section-header"  >After Photos</td></tr>
            @foreach(array_chunk($afterPhotos, 2) as $photo)
            <tr>
                @foreach($photo as $photoInner)
                <td colspan="2">
                    <img style="width: 300px; padding: 10 15" class="mt-4" src="photos/{{ $photoInner['filename'] }}">
                </td>
                @endforeach
            </tr>
            @endforeach
            <tr>
                <td colspan="2" class="input-header">Before Comments</td>
                <td colspan="2" class="input-header">After Comments</td>
            </tr>
            <tr>
                <td colspan="2">{{$kaizen->comments_before}}</td>
                <td colspan="2">{{$kaizen->comments_after}}</td>
            </tr>
            <tr>
                <td colspan="4" class="input-header">Benefits</td>
            </tr>
            <tr>
                <td  colspan="4">{{$kaizen->benefits}}</td>
            </tr>
        </table>
    @endif

</div>


