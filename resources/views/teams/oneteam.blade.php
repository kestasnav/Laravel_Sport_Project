@extends('layouts.app')
@section('content')

    <div class="row d-flex flex-wrap mt-2 mb-2">

        <div class="col-md-6 table-responsive-md">

            <table class="table">
                <thead>
                <th colspan="4">{{ __('Namų rezultatai') }} </th>
                </thead>
                <tbody>
                <tr>

                    @foreach ($homeresults as $game)


                        @if ($game->homeScore != 0 )

                            <td>{{date("Y m d", strtotime($game->gameDate))}}</td>

                            @foreach($teams as $team)

                                @if($game->homeTeam == $team->name)

                                    <td>

                                        <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">

                                        <span class="mx-1 results"> {{  $team->city }} {{  $team->name }}</span>
                                    </td>
                                @endif

                            @endforeach
                                    @foreach($teams as $team)

                                        @if($game->awayTeam == $team->name)

                                            <td>
                                                <a class="text-black" href="{{route('nba.team',$team->name)}}">
                                                <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">

                                                <span class="mx-1 results"> {{  $team->city }} {{  $team->name }}</span>
                                                </a>
                                            </td>
                                        @endif

                            @endforeach
                                <td> <span class="results">  {{  $game->homeScore }} - {{  $game->awayScore }} </span></td>
                         @endif
                </tr>
                                @endforeach

                </tbody>
            </table>
        </div>



    <div class="col-md-6 table-responsive-md">

        <table class="table">
            <thead>
            <th colspan="4">{{ __('Išvykos rezultatai') }} </th>
            </thead>
            <tbody>


<tr>
                                @foreach ($awayresults as $gamez)

                            @if ($gamez->awayScore != 0 )

            <td>{{date("Y m d", strtotime($gamez->gameDate))}}</td>

            @foreach($teams as $team)

                @if($gamez->homeTeam == $team->name)

                    <td>
                        <a class="text-black" href="{{route('nba.team',$team->name)}}">
                        <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">

                        <span class="mx-1 results"> {{  $team->city }} {{  $team->name }}</span>
                        </a>
                    </td>
                @endif
            @endforeach

                            @foreach($teams as $team)

                                @if($gamez->awayTeam == $team->name)
                                    <td>


                                        <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">
                                        <span class="mx-1 results"> {{  $team->city }} {{  $team->name }} </span>
                                    </td>
                                @endif
                            @endforeach

                            <td> <span class="results">  {{  $gamez->homeScore }} - {{  $gamez->awayScore }} </span></td>

                        @endif
                </tr>

                @endforeach

                </tbody>
            </table>
        </div>
</div>

    </div>

@endsection
