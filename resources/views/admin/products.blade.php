@extends('layouts.admin1')
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
                <div class="card-header"> {{ __('Produktai') }}
                    <a class="text-decoration-none text-white float-end mt-2" href="{{ route('products.create') }}"><i
                                class="fa-solid fa-marker"></i> {{__('Pridėti produktą')}}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th class="text-center"><b>{{ __('Pavadinimas') }}</b></th>
                                <th class="text-center"><b>{{ __('Likutis') }}</b></th>
                                <th class="text-center"><b>{{ __('Veiksmai') }}</b></th>


                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                @foreach($products as $product)

                                    <td class="text-center"> {{ $product->title }}  </td>
                                    <td class="text-center"> {{ $product->quantity }}  </td>

                                    <td class="text-center">

                                        <a class="" href="#" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-lg text-white"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a class="dropdown-item border-bottom"
                                                   href="{{ route('products.edit', $product->id) }}"><i
                                                            class="fa-solid fa-pencil"></i> {{ __('Atnaujinti') }}</a>
                                            </li>

                                            <li class="nav-item">
                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are You Sure To Delete This')"
                                                            class="dropdown-item border-bottom"><i
                                                                class="fa-solid fa-trash"></i> {{ __('Trinti') }}
                                                    </button>
                                                </form>
                                            </li>

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

