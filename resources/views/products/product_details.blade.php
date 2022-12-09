@extends('layouts.app')
@section('content')

<div class="col-sm-6 col-md-4 col-lg-4 maindiv">

    <div class="img-box">
        <img class="img-fluid image" src="{{ route('images',$product->img)}}"  alt="NoPhoto">
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

        <h6>Product Category : {{$product->productcategory->name}}</h6>
        <h6>Product Details : {{$product->description}}</h6>
        <h6>Available Quantity : {{$product->quantity}}</h6>

        <a class="text-decoration-none btn btn-primary" href="">Add to Cart</a>

    </div>
</div>
</div>

@endsection
