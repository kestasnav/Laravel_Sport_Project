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
                <div class="card-header"> {{ __('Vartotojai') }} </div>

                <div class="card-body">
                    <div class="table-responsive-md">
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th class="text-center">{{ __('Vardas') }}</th>
                            <th class="text-center">{{ __('Pavardė') }}</th>
                            <th class="text-center">{{ __('El. Paštas') }}</th>
                            <th class="text-center">{{ __('Rolė') }}</th>
                            @can('edit_user_role')
                            <th class="text-center">{{ __('Actions') }}</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($users as $user)

                                <td class="text-center"> {{ $user->name }}  </td>
                                <td class="text-center"> {{ $user->surname }}  </td>
                                <td class="text-center"> {{ $user->email }}  </td>
                                <td class="text-center"> {{ $user->type }}  </td>
                                @if($user->type == 'superadmin')
                                    <td></td>
                                @else
                                    @can('edit_user_role')
                            <td class="text-center">

                                <a class="dropdown-toggle hidden-arrow" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-lg text-black"></i>
                                </a>

                                    <ul class="dropdown-menu">

                                        <li>
                                            @if($user->type != 'superadmin')
                                                <form  action="{{ route('users.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are You Sure To Delete This')" class="dropdown-item border-bottom"><i class="fa-solid fa-trash"></i> {{ __('Trinti') }}</button>
                                                </form>
                                            @endif
                                        </li>

                                        <li>
                                            @if($user->type == 'vartotojas')
                                                <form action="{{ route('users.role', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="admin" name="type">
                                                    <button class="dropdown-item"><i class="fa fa-lock" aria-hidden="true"></i> Add Admin</button>
                                                </form>
                                            @elseif($user->type == 'books')
                                                <form action="{{ route('users.role', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="vartotojas" name="type">
                                                    <button class="dropdown-item"><i class="fa fa-unlock" aria-hidden="true"></i> Remove Admin</button>
                                                </form>
                                            @endif
                                        </li>

                                    </ul>

                            </td>
                                @endcan
                            @endif

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


