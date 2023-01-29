@extends('layouts.app')
@section('content')

<div class="d-flex flex-wrap mt-2 mb-2">

{{--    Today games--}}

    <div class="col-md-8 table-responsive-md">

        <table class="table" id="dtHorizontalExample">
            <thead>
                <th colspan="3">{{ __('Šios nakties rezultatai') }} </th>
            </thead>
            <tbody>
            <tr>


                @foreach ($results as $game)


                    @if ($game->gameDate === $yesterday)

                @foreach($teams as $team)

                    @if($game->homeTeam == $team->name)

                                <td>
                                    <a class="text-black" href="{{route('nba.team',$team->name)}}">
                            <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">

                            <span class="mx-1 results"> {{  $team->city }} {{  $team->name }}</span>
                                    </a>
                                </td>
                    @endif

                @endforeach

                @foreach($teams as $team)

                    @if($game->awayTeam == $team->name)
                            <td>

                                <a class="text-black" href="{{route('nba.team',$team->name)}}">
                            <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">
                                <span class="mx-1 results"> {{  $team->city }} {{  $team->name }} </span>
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

{{--        All games--}}

    <div class="col-md-8 table-responsive-md">

        <table class="table" id="dtHorizontalExample">
            <thead>

                <th colspan="4">{{ __('Visi rezultatai') }}</th>

            </thead>
            <tbody>
            <tr>

                @foreach ($results as $game)

                    @if ( $game->homeScore != 0 && $game->gameDate != $yesterday)

                        <td class="col-md-1 results m-1 resultwidth">{{date("m-d", strtotime($game->gameDate))}}</td>

                        @foreach($teams as $team)

                            @if($game->homeTeam == $team->name)

                                <td class="col-md-4">
                                    <a class="text-black mx-3" href="{{route('nba.team',$team->name)}}">
                                    <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">

                                    <span class="results"> {{  $team->city }} {{  $team->name }}</span>
                                    </a>
                                </td>
                            @endif

                        @endforeach

                        @foreach($teams as $team)

                            @if($game->awayTeam == $team->name)
                                <td class="col-md-4">
                                    <a class="text-black mx-3 " href="{{route('nba.team',$team->name)}}">
                                    <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">
                                    <span class="results"> {{  $team->city }} {{  $team->name }} </span>
                                    </a>
                                </td>
                            @endif
                        @endforeach

                        <td class="col-md-3 results mx-3 "> {{  $game->homeScore }} - {{  $game->awayScore }} </td>

                    @endif
            </tr>

            @endforeach



            </tbody>
        </table>
    </div>

</div>

@endsection
