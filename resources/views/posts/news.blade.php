@extends('layouts.app')
@section('content')

    <div class="row mt-3 mb-3 mx-1">


        <div class="col-md-8">

            @foreach($postai as $post)
            <div class="row mb-3">
                <div class="col-md-4">
                    <a class="text-decoration-none text-black"
                       href="{{ route('posts.show', $post->id) }}">
                        <img class="img-fluid" src="{{ route('images',$post->img)}}" style=" width: 300px; height: 200px;">
                    </a>
                </div>
                <div class="col-md-8">

                <h6 class="mb-1 mt-1"> <a class="text-decoration-none text-black" href="{{ route('posts.show', $post->id) }}">{{ $post->title}}
            </a> </h6>

                   <span class="commenttime">{{$post->created_at->diffForHumans()}}</span>
                </div>
            </div>
            @endforeach
                <div class="d-flex justify-content-end mt-2">{{ $postai->links() }}</div>
        </div>

        <div class="col-md-4">

            <h5><b>{{__('Populiariausios naujienos')}}</b></h5>
            @foreach($mostRead as $post)
                <div class="d-block border-bottom mb-0 mt-0">
                 <div class="d-flex">

                     <a class="text-decoration-none text-black th_font"
                     href="{{ route('posts.show', $post->id) }}">
                         {{ $post->title}}
                     </a>

                 </div>
                    <div class="d-flex justify-content-end">
                        <span class="commenttime">{{$post->created_at}}</span>
                    </div>
                </div>
            @endforeach

        </div>

    </div>


@endsection

