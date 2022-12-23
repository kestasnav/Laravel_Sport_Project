@extends('layouts.adminlayout')
@section('content')

    <div class="col-sm-6 col-md-4 col-lg-4 maindiv">

        <h6>{{__('Užsakovas')}}: {{$order->user->name}} {{$order->user->surname}}</h6>
        <h6>{{__('El. Paštas')}}: {{$order->user->email}} </h6>
        <h6>{{__('Tel. Nr.')}}: {{$order->user->phone}} </h6>



        <div class="detail-box">
            <h5>
                {{$order->product->title}}
            </h5>

            <div class="img-box">
                <img class="img-fluid image" style="width: 200px;" src="{{ route('images',$order->product->img)}}"  alt="NoPhoto">
            </div>

            @if($order->product->discount_price!=null)
                <h6  style="color: red;">
                    {{$order->product->discount_price}} EU
                </h6>

                <h6 style="text-decoration: line-through; color: blue;">
                    {{$order->product->price}} EU
                </h6>
            @else
                <h6 style="color: blue;">
                    {{$order->product->price}} EU
                </h6>
            @endif

            <h6>{{__('Produkto Kategorija')}} : {{$order->product->productcategory->name}}</h6>
            <h6>{{__('Produkto Aprašas')}} : {{$order->product->description}}</h6>
            <h6>{{__('Kiekis')}} : {{$order->quantity}}</h6>


        </div>
    </div>
    </div>

@endsection

