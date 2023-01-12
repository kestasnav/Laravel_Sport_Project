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
                <div class="card-header"> {{ __('Produktų kategorijos') }}
                    <a class="text-decoration-none text-white float-end mt-2"
                       href="{{ route('productcategories.create') }}"><i
                                class="fa-solid fa-marker"></i> {{__('Pridėti kategoriją')}}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th class="text-center">{{ __('Kategorija') }}</th>
                                <th class="text-center">{{ __('Veiksmai') }}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                @foreach($categories as $category)

                                    <td class="text-center"> {{ $category->name }}  </td>

                                    <td class="text-center">

                                        <a class="" href="#" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-lg text-white"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a class="dropdown-item border-bottom"
                                                   href="{{ route('productcategories.edit', $category->id) }}"><i
                                                            class="fa-solid fa-pencil"></i> {{ __('Atnaujinti') }}</a>
                                            </li>

                                            <li class="nav-item">
                                                <form action="{{ route('productcategories.destroy', $category->id) }}"
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



