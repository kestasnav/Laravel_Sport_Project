@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header">{{ __('Profilio redagavimas') }}</div>
                <div class="card-body">
                    <form action="{{ route('profileUpdate', Auth::user()->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">{{ __('Vardas') }}</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{Auth::user()->name}}">
                            @error('name')
                            @foreach( $errors->get('name') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Pavardė') }}</label>
                            <input class="form-control @error('surname') is-invalid @enderror" type="text" name="surname" value="{{Auth::user()->surname}}">
                            @error('surname')
                            @foreach( $errors->get('surname') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('El. Paštas') }}</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{Auth::user()->email}}">
                            @error('email')
                            @foreach( $errors->get('email') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Senas slaptažodis') }}</label>
                            <input class="form-control @error('password') is-invalid @enderror" type="text" name="password">


                            @error('password')
                            @foreach( $errors->get('password') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Naujas slaptažodis') }}</label>
                            <input class="form-control @error('newpassword') is-invalid @enderror" type="text" name="newpassword">


                            @error('newpassword')
                            @foreach( $errors->get('newpassword') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('Patvirtinti naują slaptažodį') }}</label>
                            <input class="form-control @error('confirm_new_password') is-invalid @enderror" type="text" name="confirm_new_password">


                            @error('confirm_new_password')
                            @foreach( $errors->get('confirm_new_password') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>


                        <button class="btn btn-primary">{{ __('Atnaujinti') }}</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('posts.index') }}">{{ __('Grįžti atgal') }}</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

