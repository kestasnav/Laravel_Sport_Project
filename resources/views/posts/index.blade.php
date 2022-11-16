@extends('layouts.app')
@section('content')

        <div class="d-flex flex-wrap mt-5 mb-4">

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
                                    <img class="img-fluid" src="{{ route('images',$post->img)}}" style=" width: 324px; height: 216px;">
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


                        </div>

                    </div>

                @endforeach
            </div>
            <div class="d-flex justify-content-end mt-2">{{ $posts->links() }}</div>

        </div>

        <div class="col-md-4 d-none d-sm-block">
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
