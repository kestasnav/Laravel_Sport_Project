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
                <div class="card-header"> {{ __('Komentarai') }} </div>

                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th class="text-center">{{ __('Data') }}</th>
                                <th class="text-center">{{ __('Komentaras') }}</th>
                                <th class="text-center">{{ __('Autorius') }}</th>
                                <th class="text-center">{{ __('Straipsnis') }}</th>
                                <th class="text-center">{{ __('Patiktukai') }}</th>
                                <th class="text-center">{{ __('Actions') }}</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                @foreach($comments as $comment)

                                    <td class="text-center"> {{ $comment->created_at}}  </td>
                                    <td class="text-center"> {{ $comment->comment}}  </td>
                                    <td class="text-center">{{ $comment->user->name}} {{ $comment->user->surname}}</td>
                                    <td class="text-center">  {{ $comment->post->title}}  </td>
                                    <td class="text-center">  {{ $comment->likes->count()}}  </td>

                                    <td class="text-center">

                                        <a class="" href="#" role="button" data-bs-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-lg text-white"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <form action="{{ route('comments.destroy', $comment->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are You Sure To Delete This')"
                                                            class="dropdown-item border-bottom"><i
                                                            class="fa-solid fa-trash"></i> {{ __('Trinti') }}</button>
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


