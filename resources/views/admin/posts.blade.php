@extends('layouts.adminlayout')
@section('content')


    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header"> {{ __('Visos naujienos') }}
                    <a class="text-decoration-none text-black float-end mt-2" href="{{ route('posts.create') }}"><i
                            class="fa-solid fa-marker"></i> {{__('Pridėti naujieną')}}</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive-lg">
                    <table class="table" id="myTable">
                        <thead>
                        <tr>
                            <th><b>{{ __('Data') }}</b></th>
                            <th><b>{{ __('Straipsnis') }}</b></th>
                            <th><b>{{ __('Straipsnio autorius:') }}</b></th>
                            <th><b>{{ __('Statusas') }}</b></th>
                            <th><b>{{ __('Komentarai') }}</b></th>
                            <th><b>{{ __('Veiksmai') }}</b></th>


                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($posts as $post)

                                <td> {{ $post->created_at }}  </td>
                                <td> {{ $post->title }}  </td>
                                <td> {{ $post->user->name }} {{ $post->user->surname }}  </td>
                                <td>
                                     @if($post->type == 'unhide')
                                        {{ __('Nepaslėptas') }}
                                    @else
                                    <b>{{ __('Paslėptas') }}</b>
                                         @endif
                                </td>
                                <td> {{ $post->comments->count() }}  </td>

                                <td>

                                    <a class="dropdown-toggle hidden-arrow" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-lg text-black"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="dropdown-item border-bottom" href="{{ route('posts.edit', $post->id) }}"><i class="fa-solid fa-pencil"></i> {{ __('Atnaujinti') }}</a>
                                        </li>

                                        <li class="nav-item">
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item border-bottom"><i class="fa-solid fa-trash"></i> {{ __('Trinti') }}</button>
                                            </form>
                                        </li>

                                        <li class="nav-item">
                                            @if($post->type == 'unhide')
                                                <form action="{{ route('hide.post', $post->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="hide" name="type">
                                                    <button class="dropdown-item border-bottom"><i class="fa fa-minus" aria-hidden="true"></i> Hide post</button>
                                                </form>
                                            @elseif($post->type == 'hide')
                                                <form action="{{ route('hide.post', $post->id) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" value="unhide" name="type">
                                                    <button class="dropdown-item border-bottom"><i class="fa fa-plus" aria-hidden="true"></i> Unhide post</button>
                                                </form>
                                            @endif
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

