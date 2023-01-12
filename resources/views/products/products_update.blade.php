@extends('layouts.admin1')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header">{{__('Produkto atnaujinimo forma')}}</div>
                <div class="card-body">
                    <form action="{{route('products.update', $product->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">{{ __('Pavadinimas') }}</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                   value="{{$product->title}}">
                            @error('title')
                            @foreach( $errors->get('title') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Aprašas') }}</label>

                            <textarea rows="10" class="form-control @error('description') is-invalid @enderror"
                                      type="text" name="description">{{$product->description}}</textarea>
                            @error('description')
                            @foreach( $errors->get('description') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>

                        <div class="mb-3">
                            <h6>{{ __('Dabartinė nuotrauka') }}</h6>
                            <img class="img-fluid" src="{{ route('images',$product->img)}}"
                                 style="width: 150px; height: 150px;" alt="NoPhoto">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label mx-2">{{ __('Pakeisti nuotrauką') }}</label>
                            <input type="file" class="form-control" name="img">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">{{ __('Kategorija') }}</label>
                            <select class="form-control @error('productcategory_id') is-invalid @enderror"
                                    name="productcategory_id">

                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @selected($product->productcategory_id==$category->id) )> {{$category->name}} </option>
                                @endforeach
                            </select>
                            @error('productcategory_id')
                            @foreach( $errors->get('productcategory_id') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Kaina') }}</label>
                            <input class="form-control @error('price') is-invalid @enderror" type="number" name="price"
                                   value="{{$product->price}}">
                            @error('price')
                            @foreach( $errors->get('price') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Kaina po nukainavimo') }}</label>
                            <input class="form-control @error('discount_price') is-invalid @enderror" type="number"
                                   name="discount_price"
                                   @if($product->discount_price != null) value="{{$product->discount_price}}"
                                   @else placeholder="0" @endif>
                            @error('discount_price')
                            @foreach( $errors->get('discount_price') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Kiekis') }}</label>
                            <input class="form-control @error('quantity') is-invalid @enderror" type="text"
                                   name="quantity" value="{{$product->quantity}}">
                            @error('quantity')
                            @foreach( $errors->get('quantity') as $error)
                                <div class="alert alert-danger"> {{ $error }} </div>
                            @endforeach
                            @enderror
                        </div>


                        <button class="btn btn-primary">{{ __('Atnaujinti') }}</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('products') }}">{{ __('Atgal') }}</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
