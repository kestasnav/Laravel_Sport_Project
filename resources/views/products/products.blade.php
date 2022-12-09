@extends('layouts.app')
@section('content')
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
                                <a href="" class="option2">
                                    {{__('Pirkti dabar')}}
                                </a>
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
