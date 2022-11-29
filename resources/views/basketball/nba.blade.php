@extends('layouts.app')

@section('content')


    <div class="row mt-1">



        @foreach($fixtures as $fixture)



                    <div class="d-flex">
                 <div> {{$fixture->date}} </div>
                    <div> {{$fixture->home_team}}</div>
                        <div> {{$fixture->away_team}}</div>
                            <div> {{$fixture->home_odds}}</div>
                                <div> {{$fixture->away_odds}}</div>
                    </div>



        @endforeach

    </div>

@endsection

