@extends('layouts.app')
@section('content')

        <div class="d-flex flex-wrap mt-2 mb-4 border-bottom d-flex justify-content-center">

            <div class="row>"
            @foreach ($data3 as $game)

                @if ($yesterday === $game->gameDate)


                        <div>
                            @foreach($teams as $team)
                                @if($game->homeTeam == $team->name)

                                <div class="p-1">
                                    <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">

                                    {{  $team->code }} {{  $game->homeScore }}
                                </div>
                                @endif
                            @endforeach

                            @foreach($teams as $team)

                                @if($game->awayTeam == $team->name)
                        <div class="p-1">
                                    <img class="img-fluid" src="{{ route('images',$team->img)}}" style=" width: 20px; height: 20px;">
                                    {{$team->code}} {{  $game->awayScore }}
                        </div>
                                @endif
                            @endforeach
                                <span class="p-1 player">  {{ $game->player }} <b>{{ $game->playerScore }}</b> pts. </span>
                        </div>

                @endif
            @endforeach
        </div>


    <div class="row mt-1 mb-3 mx-1">

        <div class="col-md-8">

            <ul class="nav-item d-inline-flex">
                <li class="nav-link mx-3"><a class="text-decoration-none text-black"
                                             href="{{ route('posts.newest') }}">{{__('Naujausios')}}</a></li>
                <li class="nav-link mx-3"><a class="text-decoration-none text-black"
                                             href="{{ route('posts.mostread') }}">{{__('Skaitomiausios')}}</a></li>
            </ul>

            <div class="row">

                @foreach($posts as $post)

                    <div class="col-md-6">

                        <div class="card border-0 bg bg-white mt-2 mb-2 position-relative cardbg">

                            <div class="mx-auto mt-3">
                                <a class="text-decoration-none text-black"
                                   href="{{ route('posts.show', $post->id) }}">
                                    <img class="img-fluid" src="{{ route('images',$post->img)}}" style=" width: 324px; height: 216px;">
                                </a>
                            </div>

                            <div class="mx-auto mt-3 mb-3">
                                <h5 class="mx-5">
                                    <a class="text-decoration-none text-black"
                                       href="{{ route('posts.show', $post->id) }}">{{ $post->title}}
                                    </a>
                                     </h5>
                            </div>

                            <h6 class="mx-3 mb-3">{{ $post->created_at }}</h6>


                        </div>

                    </div>

                @endforeach
            </div>
            <div class="d-flex justify-content-end mt-2">{{ $posts->links() }}</div>

        </div>

        <div class="col-md-4 d-none d-sm-block">

            <img class="mb-2" id="morebutton-pics" alt="Reklama" src="{{ asset('storage/images/'.'reklamas.jpg')}}" style=" width:100% ;height: 200px;">


            <div class="row">
                    <h5><b>{{__('Artimiausios rungtynės')}}</b></h5>
                    @foreach ($data['leagueSchedule']['gameDates'] as $games)
                        @foreach ($games['games'] as $game)


                            @if ($todays_date === $game['gameDateEst'])

                                <div><b>
                                        <span class="upcomingDate">  {{ date("Y-m-d H:i:s", strtotime($game['gameDateTimeEst']." +12 hours")) }} </span>
                                    </b></div>
                                <div>
                                    <span class="upcomingTeams">
                                    {{  $game['homeTeam']['teamCity'] }} {{  $game['homeTeam']['teamName'] }} -  {{  $game['awayTeam']['teamCity'] }} {{  $game['awayTeam']['teamName'] }}
                                </span>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>

            <h5 class="mt-3"><b>{{__('Populiariausios naujienos')}}</b></h5>
            @foreach($mostRead as $post)
                </p> <b>{{$post->created_at}}</b> <a class="text-decoration-none text-black"
                                                     href="{{ route('posts.show', $post->id) }}">{{ $post->title}}
            </a> </p>
            @endforeach
            <h5 class="mt-3"><b>{{__('Naujausios naujienos')}}</b></h5>
            @foreach($postai as $post)
                </p> <b>{{$post->created_at}}</b> <a class="text-decoration-none text-black"
                                                     href="{{ route('posts.show', $post->id) }}">{{ $post->title}}
            </a> </p>
                @endforeach

        </div>

    </div>

@endsection

