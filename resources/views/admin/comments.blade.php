@extends('layouts.adminlayout')
@section('content')


    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header"> {{ __('Komentarai') }} </div>

                <div class="card-body">

                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th>{{ __('Data') }}</th>
                            <th>{{ __('Komentaras') }}</th>
                            <th>{{ __('Autorius') }}</th>
                            <th>{{ __('Straipsnis') }}</th>
                            <th>{{ __('Patiktukai') }}</th>
                            <th class="d-flex justify-content-center">{{ __('Actions') }}</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($comments as $comment)

                                <td> {{ $comment->created_at}}  </td>
                                <td> {{ $comment->comment}}  </td>
                                <td>{{ $comment->user->name}} {{ $comment->user->surname}}</td>
                                <td>  {{ $comment->post->title}}  </td>
                                <td>  {{ $comment->likes->count()}}  </td>

                                    <td class="d-flex justify-content-center">

                                        <a class="dropdown-toggle hidden-arrow" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-lg text-black"></i>
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li>
                                                    <form  action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item border-bottom"><i class="fa-solid fa-trash"></i> {{ __('Trinti') }}</button>
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
@endsection


