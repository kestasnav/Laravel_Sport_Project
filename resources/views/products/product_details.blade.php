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

        <h6>{{__('Produkto Kategorija')}} : {{$product->productcategory->name}}</h6>
        <h6>{{__('Produkto Aprašas')}} : {{$product->description}}</h6>
        <h6>{{__('Prekių likutis')}} : {{$product->quantity}}</h6>

        <form action="{{route('add_cart',$product->id)}}" method="post">
            @csrf
            <div class="row">

                <div class="col-md-2">
                    <input class="p-2" type="number" name="quantity" value="1" min="1" max="{{$product->quantity}}" style="width: 50px;">
                </div>
                <div class="col-md-10">
                    <input class="btn btn-primary" value="Add to Cart" type="submit">
                </div>

            </div>
        </form>

    </div>
</div>
</div>

@endsection
