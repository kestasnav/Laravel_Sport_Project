@extends('layouts.app')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success mt-3">
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
            {{session()->get('message')}}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center"><b>{{ __('Pavadinimas') }}</b></th>
                                <th class="text-center"><b>{{ __('Kiekis') }}</b></th>
                                <th class="text-center"><b>{{ __('Kaina') }}</b></th>
                                <th class="text-center"><b>{{ __('Nuotrauka') }}</b></th>
                                <th class="text-center"><b>{{ __('Veiksmai') }}</b></th>


                            </tr>
                            </thead>
                            <tbody>

                               <div class="d-none" {{ $totalPrice = 0 }}</div>
                    <div class="d-none" {{ $totalPriceDiscount = 0 }}</div>
                                @foreach($cart as $cart)
                                    <tr>
                                    <td class="text-center"> {{ $cart->product->title }}  </td>
                                    <td class="text-center"> {{ $cart->quantity }}  </td>
                                    <td class="text-center">
                                        @if($cart->product->discount_price == null)
                                        {{ $total = $cart->product->price * $cart->quantity }} EU
                                            @else
                                            {{ $total = $cart->product->discount_price * $cart->quantity }} EU
                                        @endif
                                        @if($cart->quantity > 1)
                                        <div class="opacity-50">
                                        ({{$total/$cart->quantity}} EU x {{$cart->quantity}} {{ __('vnt.') }})
                                        </div>
                                            @endif
                                    </td>
                                    <td class="text-center"> <img class="img-fluid" src="{{ route('images',$cart->product->img)}}" style="width: 100px;" alt="NoPhoto"></td>

                                    <td class="text-center">
                                        <a class="text-black" href="{{ route('remove_item', $cart->id) }}"
                                           onclick="return confirm('Are You Sure To Remove This')">
                                            <i class="fa-solid fa-trash px-1"></i>
                                            {{ __('Pašalinti') }} </a>
                                    </td>

                            </tr>

                                    <div class="d-none"> {{  $totalPriceDiscount = $totalPriceDiscount + $total }} </div>
                    <div class="d-none"> {{  $totalPrice = $totalPrice + ($cart->product->price * $cart->quantity) }} </div>
                            @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>

                <div class="d-flex justify-content-end">
                    <div class="row">
                    <h6>{{ __('Bendra suma') }}: {{$totalPrice}} EU</h6>
                    <h6>{{ __('Nuolaida') }}: -{{$totalPrice - $totalPriceDiscount}} EU</h6>
                    <h6>{{ __('Suma su nuolaida') }}: {{$totalPriceDiscount}} EU</h6>
                    </div>
                </div>
             </div>
        </div>

    </div>
@endsection
