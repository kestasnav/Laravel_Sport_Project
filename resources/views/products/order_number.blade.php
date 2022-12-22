@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">

                <div class="card-body">
       <h5 class="mt-5 mb-5 mx-auto text-center">{{ __('Jūsų užsakymas') }} <b>{{$orderis}}</b> {{ __('vykdomas.') }}</h5>
                    <h5 class="mt-5 mb-5 mx-auto text-center">{{ __('Informacija apie užsakymą išsiuntėmė El. Paštu') }} </h5>

       <h5 class="text-center"> <a class="btn btn-primary" href="{{route('products.index')}}">{{ __('Tęsti apsipirkimą') }}</a>
                        </h5>

    </div>
            </div>
        </div>
    </div>

@endsection
