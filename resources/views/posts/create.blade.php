@extends('layouts.adminlayout')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header">{{ __('Straipsnio sukūrimo forma') }}</div>
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                        <div class="mb-3">
                            <label class="form-label">{{ __('Naujienos antraštė') }}</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{old('title')}}">
                            @error('title')
                            @foreach( $errors->get('title') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Visas straipsnis') }}</label>

                            <textarea rows="10" class="form-control tinymce-editor @error('post') is-invalid @enderror" type="text" name="post" value="{{old('post')}}"></textarea>
                            @error('post')
                            @foreach( $errors->get('post') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>

                            <div class="mb-3">
                                <label for="" class="form-label mx-2">{{ __('Straipsnio nuotrauka') }}</label>
                                <input type="file" class="form-control" name="img">
                            </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Nuotraukos autorius') }}</label>
                            <input @error('photoauthor') is-invalid @enderror" type="text" name="photoauthor" value="{{old('photoauthor')}}">
                            @error('photoauthor')
                            @foreach( $errors->get('photoauthor') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">{{ __('Kategorija') }}</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" >
                                <option selected>{{ __('Pasirinkti') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @selected(old('category_id')==$category->id) )> {{$category->name}} </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            @foreach( $errors->get('category_id') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">{{ __('Subkategorija') }}</label>
                            <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" >
                                <option selected>{{ __('Pasirinkti') }}</option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}" @selected(old('subcategory_id')==$subcategory->id) )> {{$subcategory->name}} </option>
                                @endforeach
                            </select>
                            @error('subcategory_id')
                            @foreach( $errors->get('subcategory_id') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>


                        <button class="btn btn-primary">Post</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('admin.posts') }}">Go Back</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

