@extends('layouts.app')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success mt-3">
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
            {{session()->get('message')}}
        </div>
    @endif
<section class="product_section layout_padding">
    <div class="container">

        <div class="row">

            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{route('products.show',$product->id)}}" class="option1">
                                    {{__('Produkto Aprašas')}}
                                </a>
{{--                                <a href="" class="option2">--}}
{{--                                    {{__('Pirkti dabar')}}--}}
{{--                                </a>--}}
                                <form action="{{route('add_cart',$product->id)}}" method="post">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-4">
                                            <input class="p-2" type="number" name="quantity" value="1" min="1" max="{{$product->quantity}}" style="width: 50px;">
                                        </div>
                                        <div class="col-md-4">
                                            <input class="option2 rounded-5 p-2" value="{{__('Į krepšelį')}}" type="submit">
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="img-box">
                            <img class="img-fluid" src="{{ route('images',$product->img)}}"  alt="NoPhoto">

                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$product->title}}
                            </h5>

                            @if($product->discount_price!=null)
                                <h6  style="color: red;">
                                    {{$product->discount_price}} EU
                                </h6>

                                <h6 style="text-decoration: line-through; color: blue;">
                                    {{$product->price}} EU
                                </h6>
                            @else
                                <h6 style="color: blue;">
                                    {{$product->price}} EU
                                </h6>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
</section>

@endsection
