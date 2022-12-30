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
                <div class="card-header"> {{ Auth::user()->name }} {{ Auth::user()->surname }} {{ __('Užsakymai') }} </div>

                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th class="text-center">{{ __('Data') }}</th>
                                <th class="text-center">{{ __('Užsakymo Nr.') }}</th>
                                <th class="text-center">{{ __('Produktas') }}</th>

                                <th class="text-center">{{ __('Kiekis') }}</th>

                                <th class="text-center">{{ __('Užsakymo statusas') }}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                @foreach($orders as $order)

                                    <td class="text-center">
                                        {{ $order->created_at}}
                                    </td>
                                    <td class="text-center">
                                        {{ $order->order_number}}
                                    </td>
                                    <td class="text-center">
                                        <a class="text-black" href="{{ route('products.show',$order->product->id) }}">
                                            {{ $order->product->title}}
                                            <i class="fa-solid fa-chevron-right text-primary"></i>
                                        </a>
                                    </td>

                                    <td class="text-center">{{ $order->quantity}} </td>

                                    <td class="text-center">  {{ $order->order_status}}  </td>

                            </tr>


                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection


