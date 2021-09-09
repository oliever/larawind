@extends ('layouts.pdf-kaizen')
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
            <td colspan="4" class="section-header">KAIZEN CONTINUOUS IMPROVEMENT SUGGESTION FORM</td>
        </tr>
        <tr >
            <td colspan="2" style="padding: 10 0">Name: <strong>{{$kaizen->name}}</strong> </td>
            <td style="width: 20%">Date: <strong>{{Carbon\Carbon::create($kaizen->posted)->toFormattedDateString()}}</strong></td>
            <td style="width: 30%">Store Name: <strong>{{$kaizen->location->name}}</strong></td>
        </tr>
        <tr >
            <td colspan="6" class="section-header">AREAS AFFECTED</td>
        </tr>
        @foreach($affectedAreas as $affectedArea)
            <tr>
                @foreach($affectedArea as $affectedAreaInner)
                <td style="width: 25%">
                    <span>
                        <input style="vertical-align: middle" type="checkbox" checked/>
                        <span style="vertical-align: middle">
                            {{ $affectedAreaInner['name']}}
                        </span>
                    </span>
                </td>
                @endforeach
            </tr>
        @endforeach
        <tr>
            <td colspan="2" class="section-header">Reason For kaizen</td>
            <td colspan="2" class="section-header">Problem</td>
        </tr>
        <tr>
            <td  colspan="2">{{$kaizen->reason}}</td><td  colspan="2">{{$kaizen->problem}}</td>
        </tr>
    </table>

</div>
