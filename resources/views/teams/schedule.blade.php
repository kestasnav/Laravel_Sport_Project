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
                                  <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">  {{  $game['homeTeam']['teamCity'] }} {{  $game['homeTeam']['teamName'] }}
                                    </span>
                                        @endif

                                        @endforeach

                                        -

                                        @foreach($teams as $team)

                                            @if($game['awayTeam']['teamName'] == $team->name)
                            <span class="mx-1">
                                        <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">
                                        {{  $game['awayTeam']['teamCity'] }} {{  $game['awayTeam']['teamName'] }}

                                </span>
                </div>
                        @endif

                    @endforeach
            @endif
        @endforeach
    @endforeach
</div>
</div>



<form action="{{ route('team.schedule',$team->name) }}" method="post">
    @csrf

    <div class="mb-3">
        <label class="form-label">Komanda</label>
        <select class="form-control" name="team" >
            <option selected>Pasirinkti</option>
            @foreach($teams as $team)
                <option value="{{$team->name}}"> {{$team->name}} </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-success">Pasirinkti</button>
</form>


</div>

@endsection
