@extends('layouts.app')
@section('content')

    <div class="d-flex flex-wrap mt-5">
        <a class="btn btn-success float-end " href="{{ route('posts.create') }}"><i class="fa-solid fa-marker"></i> {{__('Pridėti naujieną')}}</a>
    </div>
    <div class="row mt-1">



        @foreach($posts as $post)

            <div class="col-md-6">

                <div class="card mt-1 mb-1 position-relative">


                    <div class="mx-auto">
                        <img src="{{ route('images',$post->img)}}" style=" width: 324px; height: 216px;">

                    </div>

                    <div class="mx-auto"><a  href="{{ route('posts.show', $post->id) }}" >{{ $post->title}}</a></div>

                    <div class="position-absolute">
                        <div class="mx-1 mt-1 mb-1">
                            <a class="btn btn-primary float-end mx-1" href="{{ route('posts.edit', $post->id) }}"><i class="fa-solid fa-pencil"></i></a>
                        </div>
                        <div class="mx-1 mt-1 mb-1">
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mx-1 mt-1 mb-1"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>

                    </div>


                </div>

            </div>

        @endforeach

    </div>
{{--    <div class="float-end">{{ $posts->links() }}</div>--}}



@endsection
