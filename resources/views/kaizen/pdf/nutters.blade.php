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
        <tr >
            <td colspan="2" style="padding: 10 0">Name: <strong>{{$kaizen->name}}</strong> </td>
        </tr>
        <tr>
            <td style="padding-bottom: 10">
                Team Members:<br>
                @foreach ($kaizen->users as $member)
                    <strong>{{ $member->name }}</strong><br>
                @endforeach
            </td>
            <td style="padding-bottom: 10" >Stores: <br>
                @if($kaizen->all_locations)
                    <strong>All Stores</strong><br>
                @else
                    @foreach ($kaizen->locations as $store)
                        <strong>{{ $store->name }}</strong><br>
                    @endforeach
                @endif

            </td>
            <td colspan="2">Date Assigned: <strong>{{Carbon\Carbon::create($kaizen->date_assigned)->toFormattedDateString()}}</strong></td>
        </tr>
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
            <td colspan="2" class="input-header">Reason For kaizen</td>
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
        <tr> <td colspan="4" class="section-header"  >PHOTOS</td></tr>

        @foreach($photos as $photo)
        <tr>
            @foreach($photo as $photoInner)
            <td colspan="2">
                <img style="width: 300px; padding: 10 15" class="mt-4" src="photos/{{ $photoInner['filename'] }}">
            </td>
            @endforeach
        </tr>
        @endforeach

        @if ($kaizen->before_after)
            <tr> <td colspan="4" class="section-header">BEFORE AND AFTER REPORT</td></tr>
            <tr>
                <td colspan="2" class="input-header">Before Photos</td>
                <td colspan="2" class="input-header">After Photos</td>
            </tr>
            <tr>
                <td colspan="2">
                    <table>
                        <tr>
                            @foreach($before_photos as $photo)
                            <td colspan="2" style="text-align: center">
                                <img style="width: 300px; padding: 10px" class="mt-4" src="photos/{{ $photo['filename'] }}">
                            </td>
                            @endforeach
                        </tr>
                    </table>
                </td>
                <td colspan="2">
                    <table>
                        <tr>
                            @foreach($after_photos as $photo)
                            <td colspan="2" style="text-align: center">
                                <img style="width: 300px; padding: 10px" class="mt-4" src="photos/{{ $photo['filename'] }}">
                            </td>
                            @endforeach
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="input-header">Benefits</td>
            </tr>
            <tr>
                <td  colspan="4">{{$kaizen->benefits}}</td>
            </tr>
        @endif
    </table>

</div>


