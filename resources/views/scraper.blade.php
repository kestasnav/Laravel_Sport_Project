@extends('layouts.app')
@section('content')

<div class="container">



    <h5 ><b>{{__('Šiandienos rungtynių rezultatai')}}</b></h5>



    @foreach ($data3 as $game)

            @if ($yesterday === $game->gameDate)

        <div class="border-bottom">
                <div> {{  $game->homeTeam }}  <b>{{  $game->homeScore }}:{{  $game->awayScore }}</b>  {{  $game->awayTeam }} </div>
                <div>{{__('Rezultatyviausias žaidėjas:')}}
                    <b>
                        <br>

                        {{ $game->player }}


                    {{ $game->playerScore }}


                    </b>

            @endif

        @endforeach
        </div>
        </div>
</div>
@endsection
