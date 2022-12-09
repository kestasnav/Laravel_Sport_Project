@extends('layouts.adminlayout')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header">{{ __('Kategorijos sukūrimo forma') }}</div>
                <div class="card-body">
                    <form action="{{ route('productcategories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">{{ __('Pavadinimas') }}</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}">
                            @error('name')
                            @foreach( $errors->get('title') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>


                        <button class="btn btn-primary">{{ __('Sukurti') }}</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('productcategories.index') }}">{{ __('Atgal') }}</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

