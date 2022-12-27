@extends('layouts.adminlayout')
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
                <div class="card-header"> {{ __('Užsakymai') }} </div>

                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th class="text-center">{{ __('Užsakymo Nr.') }}</th>
                                <th class="text-center">{{ __('Produktas') }}</th>
                                <th class="text-center">{{ __('Užsakovas') }}</th>
                                <th class="text-center">{{ __('Kiekis') }}</th>
                                <th class="text-center">{{ __('Apmokėjimo statusas') }}</th>
                                <th class="text-center">{{ __('Užsakymo statusas') }}</th>
                                <th class="text-center">{{ __('Veiksmai') }}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                @foreach($orders as $order)

                                    <td class="text-center">
                                        <a class="text-black" href="{{route('orders.show',$order->id)}}">
                                            {{ $order->order_number}} <i class="fa-solid fa-chevron-right text-primary"></i>
                                        </a>
                                    </td>
                                    <td class="text-center"> {{ $order->product->title}}  </td>
                                    <td class="text-center">{{ $order->user->name}} {{ $order->user->surname}}</td>
                                    <td class="text-center">{{ $order->quantity}} </td>
                                    <td class="text-center">  {{ $order->payment_status}}  </td>
                                    <td class="text-center">  {{ $order->order_status}}  </td>

                                    <td class="text-center">

                                        <a class="dropdown-toggle hidden-arrow" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-lg text-black"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <form  action="{{ route('orders.destroy', $order->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are You Sure To Delete This')" class="dropdown-item border-bottom">
                                                        <i class="fa-solid fa-trash"></i> {{ __('Trinti') }}</button>
                                                </form>
                                            </li>
                                            @if($order->order_status == 'processing')
                                            <li>
                                                <form  action="{{ route('orders.complete', $order->id) }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <button onclick="return confirm('Are You Sure To Change This Status')" class="dropdown-item border-bottom">
                                                        <i class="fa-solid fa-check"></i> {{ __('Paruoštas') }}</button>
                                                </form>
                                            </li>
                                            @elseif($order->order_status == 'Completed')
                                            <li>
                                                <form  action="{{ route('orders.delivery', $order->id) }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <button onclick="return confirm('Are You Sure To Change This Status')" class="dropdown-item border-bottom">
                                                        <i class="fas fa-shipping-fast"></i> {{ __('Pristatytas') }}</button>
                                                </form>
                                            </li>
                                                @endif
                                        </ul>

                                    </td>
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


