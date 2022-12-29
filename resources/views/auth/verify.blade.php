@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5 mb-5">
                <div class="card-header">{{ __('Patvirtinkite Savo El. Paštą') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Nauja patvirtinimo nuoroda nusiųsta į jūsų el. paštą.') }}
                        </div>
                    @endif

                   <p> {{ __('Prieš tęsiant, pasitikrinte savo el. pašte esančią patvirtinimo nuorodą.') }} </p>
                        <p> {{ __('Jeigu negavote el. laiško,') }}</p>
                        <p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary p-2 m-0 align-baseline text-decoration-none">{{ __('spauskite čia') }}</button>
                    </form>
                        </p>
                        <p> {{ __('Ir atsiųsime naują.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
