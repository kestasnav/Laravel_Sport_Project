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

                                <th class="th_font">{{ __('Rytų konferencija') }}</th>

                                <th class="th_font">{{ __('Perg.') }}</th>
                                <th class="th_font">{{ __('Pral.') }}</th>
                                <th class="th_font">W/L %</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                @foreach($east as $east)


                                    <td class="td_font">
                                        <img class="img-fluid" src="{{ route('images',$east->img)}}" style=" width: 30px; height: 20px;">
                                        {{ $east->city}} {{ $east->name}}  </td>

                                    <td class="td_font">   </td>
                                    <td class="td_font">   </td>
                                    <td class="td_font">   </td>
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

                                <th class="th_font">{{ __('Vakarų konferencija') }}</th>

                                <th class="th_font">{{ __('Perg.') }}</th>
                                <th class="th_font">{{ __('Pral.') }}</th>
                                <th class="th_font">W/L %</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                @foreach($west as $west)


                                    <td class="td_font">
                                        <img class="img-fluid" src="{{ route('images',$west->img)}}" style=" width: 30px; height: 20px;">
                                        {{ $west->city}} {{ $west->name}}  </td>

                                    <td class="td_font">   </td>
                                    <td class="td_font">   </td>
                                    <td class="td_font">   </td>
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


