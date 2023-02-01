@extends('layouts.app')
@section('content')

<div class="d-flex flex-wrap mt-2 mb-2">

    <div class="row">
    <h5><b>{{__('Artimiausios rungtynės')}}</b></h5>
    @foreach ($data['leagueSchedule']['gameDates'] as $games)
        @foreach ($games['games'] as $game)


            @if ($tomorrow === $game['gameDateEst'])



                <div><i>
                        <span>  {{ date("H:i:s", strtotime($game['gameDateTimeEst']." +7 hours")) }} </span>
                    </i>

                    @foreach($teams as $team)

                        @if($game['homeTeam']['teamName'] == $team->name)
                                    <span class="mx-1">
                                        <a class="text-black" href="{{route('nba.team',$game['homeTeam']['teamName'])}}">
                                  <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">  {{  $game['homeTeam']['teamCity'] }} {{  $game['homeTeam']['teamName'] }}
                                        </a>
                                    </span>
                                        @endif

                                        @endforeach

                                        -

                                        @foreach($teams as $team)

                                            @if($game['awayTeam']['teamName'] == $team->name)
                            <span class="mx-1">
                                <a class="text-black" href="{{route('nba.team',$game['awayTeam']['teamName'])}}">
                                        <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">
                                        {{  $game['awayTeam']['teamCity'] }} {{  $game['awayTeam']['teamName'] }}
                                </a>
                                </span>
                </div>
                        @endif

                    @endforeach
            @endif
        @endforeach
    @endforeach
</div>
</div>


<div class="mb-3">
    <h5><b> {{__('Vienos komandos tvarkaraštis')}}</b></h5>
<form action="{{ route('team.schedule') }}" method="post">
    @csrf

<div class="d-flex flex-wrap">

        <select class="form-control w-25" name="team" >
            <option>{{__('Pasirinkti komandą')}}</option>
            @foreach($teams as $team)
                <option value="{{$team->name}}" @selected($team->name==$filter_team)> {{$team->name}} </option>
            @endforeach
        </select>
    <button class="mx-1 btn btn-light px-1 py-1 commentbutton">{{__('Pasirinkti')}}</button>
</div>
</form>
</div>

@if(isset($filter_team))
    <h5><b> {{ $filter_team }} {{__('Artimiausios rungtynės')}}</b></h5>
    <div class="row mb-3">

        @foreach ($data['leagueSchedule']['gameDates'] as $games)
            @foreach ($games['games'] as $game)


                @if ($game['homeTeam']['teamName'] === $filter_team && $game['homeTeam']['score'] == 0)

                    <span> <i> {{date("Y-m-d H:i:s", strtotime($game['gameDateTimeEst']." +7 hours"))}} </i>
                        </span>

                    <span class="mx-2 border-bottom">
                        <a class="text-black" href="{{route('nba.team',$game['homeTeam']['teamName'])}}">
                        <b>{{$game['homeTeam']['teamName'] }}</b>
                        </a>
                        vs
                        <a class="text-black" href="{{route('nba.team',$game['awayTeam']['teamName'])}}">
                             {{$game['awayTeam']['teamName']}} </span>
                        </a>
                @elseif ($game['awayTeam']['teamName'] === $filter_team && $game['awayTeam']['score'] == 0)

                    <span> <i> {{date("Y-m-d H:i:s", strtotime($game['gameDateTimeEst']." +7 hours"))}} </i>
                    </span>

                    <span class="mx-2 border-bottom">
                        <a class="text-black" href="{{route('nba.team',$game['homeTeam']['teamName'])}}">
                        {{$game['homeTeam']['teamName'] }}
                        </a>
                        vs
                        <a class="text-black" href="{{route('nba.team',$game['awayTeam']['teamName'])}}">
                             <b>{{$game['awayTeam']['teamName']}}</b> </span>
                    </a>
                @endif

            @endforeach
        @endforeach

    </div>
@endif

</div>

@endsection
