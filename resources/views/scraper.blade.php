@extends('layouts.app')
@section('content')

<div class="container">


<div class="">
    <h5 ><b>{{__('Artimiausios rungtynės')}}</b></h5>
    <div class="">
    @foreach ($data['leagueSchedule']['gameDates'] as $games)
    @foreach ($games['games'] as $game)


            @if ($todays_date === $game['gameDateEst'])

            <div><b>
                    {{ date("Y-m-d H:i:s", strtotime($game['gameDateTimeEst']." +12 hours")) }}
                </b></div>
            <div> {{  $game['homeTeam']['teamName'] }} -  {{  $game['awayTeam']['teamName'] }} </div>
            @endif
            @endforeach
            @endforeach

        </div>

</div>
</div>
@endsection
