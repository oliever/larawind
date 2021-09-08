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
            <td colspan="4" style="background: #000; color: #fff; padding: 5px">KAIZEN CONTINUOUS IMPROVEMENT SUGGESTION FORM</td>
        </tr>
        <tr>
            <td colspan="2">Name: <strong>{{$kaizen->name}}</strong> </td>
            <td>Date: <strong>{{Carbon\Carbon::create($kaizen->posted)->toFormattedDateString()}}</strong></td>
            <td>Store Name: <strong>{{$kaizen->location->name}}</strong></td>
        </tr>
        <tr>
            <td colspan="4" style="background: #000; color: #fff; padding: 5px">AREAS AFFECTED</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>
