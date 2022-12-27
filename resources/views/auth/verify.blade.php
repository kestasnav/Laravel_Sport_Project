@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5 mb-5">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                   <p> {{ __('Before proceeding, please check your email for a verification link.') }} </p>
                        <p> {{ __('If you did not receive the email,') }}</p>
                        <p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary p-2 m-0 align-baseline text-decoration-none">{{ __('click here') }}</button>
                    </form>
                        </p>
                        <p> {{ __('To request another.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
