@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">

                <div class="card-body">
       <h5 class="mt-5 mb-5 mx-auto text-center">{{ __('Jūsų užsakymas') }} <b>{{$orderis}}</b> {{ __('vykdomas.') }}</h5>
    </div>
            </div>
        </div>
    </div>

@endsection
