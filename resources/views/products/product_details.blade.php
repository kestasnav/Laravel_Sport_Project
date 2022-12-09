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

        <a class="text-decoration-none btn btn-primary" href="">{{__('Į krepšelį')}}</a>

    </div>
</div>
</div>

@endsection
