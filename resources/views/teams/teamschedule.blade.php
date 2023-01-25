@extends('layouts.app')
@section('content')

    <div class="d-flex flex-wrap mt-2 mb-2">

        <h5><b> {{ $filter_team }} {{__('Artimiausios rungtynės')}}</b></h5>
        <div class="row">

    @foreach ($data['leagueSchedule']['gameDates'] as $games)
        @foreach ($games['games'] as $game)


             @if ($game['homeTeam']['teamName'] === $filter_team && $game['homeTeam']['score'] == 0)

                        <span> <i> {{date("Y-m-d H:i:s", strtotime($game['gameDateTimeEst']." +7 hours"))}} </i>
                            <span class="mx-2"> <b>{{$game['homeTeam']['teamName'] }}</b> vs {{$game['awayTeam']['teamName']}} </span>
                        </span>
             @elseif ($game['awayTeam']['teamName'] === $filter_team && $game['awayTeam']['score'] == 0)

                        <span> <i> {{date("Y-m-d H:i:s", strtotime($game['gameDateTimeEst']." +7 hours"))}} </i>
                            <span class="mx-2">   {{$game['homeTeam']['teamName'] }} vs <b>{{$game['awayTeam']['teamName']}}</b> </span>
                         </span>
             @endif

         @endforeach
     @endforeach

        </div>
    </div>

 @endsection
