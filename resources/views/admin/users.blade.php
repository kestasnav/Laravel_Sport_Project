@extends('layouts.adminlayout')
@section('content')


    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header"> {{ __('Vartotojai') }} </div>

                <div class="card-body">

                    <table class="table" >
                        <thead>
                        <tr>
                            <th>{{ __('Vardas') }}</th>
                            <th>{{ __('Pavardė') }}</th>
                            <th>{{ __('Rolė') }}</th>
                            <th></th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($users as $user)

                                <td> {{ $user->name }}  </td>
                                <td> {{ $user->surname }}  </td>
                                <td> {{ $user->type }}  </td>

                                <td>
                                    @if($user->type != 'superadmin')
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    @endif
                                </td>

                                <td>
                                    @if($user->type == 'vartotojas')
                                    <form action="{{ route('users.role', $user->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="admin" name="type">
                                        <button class="btn btn-success">Add Admin</button>
                                    </form>
                                        @elseif($user->type == 'admin')
                                        <form action="{{ route('users.role', $user->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="vartotojas" name="type">
                                            <button class="btn btn-info">Remove Admin</button>
                                        </form>
                                    @endif
                                </td>

                        </tr>


                        @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>
@endsection


