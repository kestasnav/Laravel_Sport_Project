@extends('layouts.adminlayout')
@section('content')


    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header"> {{ __('Visos naujienos') }} </div>

                <div class="card-body">

                    <table class="table" >
                        <thead>
                        <tr>
                            <th>{{ __('Straipsnis') }}</th>
                            <th>{{ __('Straipsnio autorius:') }}</th>
                            <th></th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($posts as $post)

                                <td> {{ $post->title }}  </td>
                                <td> {{ $post->user->name }}  </td>

                                <td><a class="btn btn-success" href="{{ route('posts.edit', $post->id) }}"><i class="fa-solid fa-pencil"></i></a></td>


                                <td>

                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>

                                </td>

                                <td>
                                    @if($post->type == 'unhide')
                                        <form action="{{ route('hide.post', $post->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="hide" name="type">
                                            <button class="btn btn-success">Hide post</button>
                                        </form>
                                    @elseif($post->type == 'hide')
                                        <form action="{{ route('hide.post', $post->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" value="unhide" name="type">
                                            <button class="btn btn-info">Unhide post</button>
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

