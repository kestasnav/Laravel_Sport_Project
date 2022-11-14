@extends('layouts.app')
@section('content')

        <div class="d-flex flex-wrap mt-5 mb-4">
        @can('create', \App\Models\Post::class)
        <a class="btn btn-success float-end mt-2" href="{{ route('posts.create') }}"><i
                class="fa-solid fa-marker"></i> {{__('Pridėti naujieną')}}</a>
        @endcan
    </div>

    <div class="row mt-1 mb-3 mx-1">

        <div class="col-md-8">
            <div class="row">
                @foreach($posts as $post)

                    <div class="col-md-6">

                        <div class="card border-0 bg bg-white mt-1 mb-1 position-relative cardbg">

                            <div class="mx-auto mt-3">
                                <a class="text-decoration-none text-black"
                                   href="{{ route('posts.show', $post->id) }}">
                                    <img src="{{ route('images',$post->img)}}" style=" width: 324px; height: 216px;">
                                </a>
                            </div>

                            <div class="mx-auto mt-3 mb-3">
                                <h5 class="mx-5">
                                    <a class="text-decoration-none text-black"
                                       href="{{ route('posts.show', $post->id) }}">{{ $post->title}}
                                    </a>
                                     </h5>
                            </div>

                            <h6 class="mx-3 mb-3">{{ $post->created_at }}</h6>

                            @can('update', $post)
                            <div class="position-absolute">
                                <div class=" mt-1 mb-1 ">
                                    <a class="btn btn-primary "
                                       href="{{ route('posts.edit', $post->id) }}"><i
                                            class="fa-solid fa-pencil"></i></a>
                                </div>
                                @can('delete', $post)
                                <div class=" mt-1 mb-1">
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mt-1 mb-1"><i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                @endcan
                            </div>

                            @endcan
                        </div>

                    </div>

                @endforeach
            </div>
            <div class="d-flex justify-content-end mt-2">{{ $posts->links() }}</div>

        </div>

        <div class="col-md-4">
            <h5>{{__('Naujausios naujienos')}}</h5>
            @foreach($postai as $post)
                </p> <b>{{$post->created_at}}</b> <a class="text-decoration-none text-black"
                                                     href="{{ route('posts.show', $post->id) }}">{{ $post->title}}
            </a> </p>
                @endforeach
            <div class="d-flex justify-content-end mt-2">{{ $postai->links() }}</div>
        </div>

    </div>
@endsection
