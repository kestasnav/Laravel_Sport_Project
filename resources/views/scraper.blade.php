@extends('layouts.app')
@section('content')

<div class="container">



    <h5 ><b>{{__('Turnyrinė lentelė')}}</b></h5>


            <table class="table" id="myTable">
                <thead>





                <tr>

                    <th class="text-center">Pozicija </th>
                    <th class="text-center">Komanda </th>
                    <th class="text-center">Pozicija </th>
                    <th class="text-center">Pozicija </th>
                    <th class="text-center">Pozicija </th>
                    <th class="text-center">Pozicija </th>
                </tr>
                </thead>

                <tbody>
                @foreach ($data2 as $key2 => $val2)
                <tr>

                        <th class="text-center">{{ $key2 }}</th>

                </tr>
                </tbody>


                @endforeach
            </table>


</div>
@endsection
