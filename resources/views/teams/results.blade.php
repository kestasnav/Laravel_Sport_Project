@extends('layouts.app')
@section('content')

<div class="d-flex flex-wrap mt-2 mb-2">

{{--    Today games--}}

    <div class="col-md-7 table-responsive-md">

        <table class="table" id="myTable">
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
                            <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">

                            <span class="mx-1 results"> {{  $team->city }} {{  $team->name }}</span>
                                </td>
                    @endif

                @endforeach

                @foreach($teams as $team)

                    @if($game->awayTeam == $team->name)
                            <td>


                            <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">
                                <span class="mx-1 results"> {{  $team->city }} {{  $team->name }} </span>
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

    <div class="col-md-7 table-responsive-md">

        <table class="table" id="myTable">
            <thead>

                <th colspan="4">{{ __('Visi rezultatai') }}</th>

            </thead>
            <tbody>
            <tr>

                @foreach ($results as $game)

                    @if ( $game->homeScore != 0 && $game->gameDate != $yesterday)

                        <td class="results">{{date("m-d", strtotime($game->gameDate))}}</td>

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
                                    <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">
                                    <span class="mx-1 results"> {{  $team->city }} {{  $team->name }} </span>
                                </td>
                            @endif
                        @endforeach

                        <td><span class="results"> {{  $game->homeScore }} - {{  $game->awayScore }} </span></td>

                    @endif
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</div>

@endsection
