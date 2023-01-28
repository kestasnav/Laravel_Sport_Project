@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col-md-4 mt-5 mb-5">
            <div class="card">


                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>

                                <th colspan="2" class="th_font">{{ __('Rytų Konferencija') }}</th>

                                <th class="th_font">{{ __('Perg.') }}</th>
                                <th class="th_font">{{ __('Pral.') }}</th>
                                <th class="th_font">W/L %</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <?php $countEast=1; ?>
                                <?php $countWest=1; ?>
                                @foreach($east as $east)

                                    <td class="td_font">{{$countEast++}}</td>
                                    <td class="td_font">
                                        <a href="{{route('nba.team',$east->name)}}">
                                        <img class="img-fluid" src="{{ route('images',$east->img)}}" style=" width: 30px; height: 20px;">
                                        {{ $east->city}} {{ $east->name}}  </td>
                            </a>
                                    <td class="td_font"> {{$east->wins}}  </td>
                                    <td class="td_font"> {{$east->losses}}  </td>
                                    <td class="td_font"> {{substr($east->percent, 0, 4) }} %</td>
                            </tr>


                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 mt-5 mb-5">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>

                                <th colspan="2" class="th_font">{{ __('Vakarų Konferencija') }}</th>

                                <th class="th_font">{{ __('Perg.') }}</th>
                                <th class="th_font">{{ __('Pral.') }}</th>
                                <th class="th_font">W/L %</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                @foreach($west as $west)

                                    <td class="td_font">{{$countWest++}}</td>
                                    <td class="td_font">
                                        <a href="{{route('nba.team',$west->name)}}">

                                        <img class="img-fluid" src="{{ route('images',$west->img)}}" style=" width: 30px; height: 20px;">
                                        {{ $west->city}} {{ $west->name}}  </td>
                                        </a>
                                    <td class="td_font">{{$west->wins}}  </td>
                                    <td class="td_font"> {{$west->losses}}  </td>
                                    <td class="td_font"> {{substr($west->percent, 0, 4) }} %  </td>
                            </tr>


                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection


