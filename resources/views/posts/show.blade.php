@extends('layouts.app')
@section('content')

    <div class="d-flex flex-wrap mt-5 ">

    </div>
    <div class="row mt-1 mb-5">




            <div class="col-md-12">

                <div class="card mt-1 mb-1 position-relative">

                    <div class="mx-3 mt-1 mb-1"><b><h1>{{ $post->title}}</h1></b></div>
                    <div class="mx-5 mt-1 mb-1">{{ $post->created_at}} </div>
                    <div class="mx-5 mb-2"> {{ __('Straipsnio autorius:') }} <b>{{ $post->user->name}} {{ $post->user->surname}}</b></div>
                    <div class="mx-auto">
                        <img class="img-fluid" src="{{ route('images',$post->img)}}" style=" width: 500px; height: 350px;">

                    </div>
                    <div class="mx-3 mt-3"><p>{!! $post->post  !!} </p></div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                @if(\Illuminate\Support\Facades\Auth::user() != null)
                <form action="{{ route('comments.store', $post->id) }}" method="post" enctype="multipart/form-data" class="mt-2">
                    @csrf
                    <div class="mb-3">
                        <h4><label class="form-label">{{ __('Rašyti komentarą') }}</label></h4>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <textarea rows="6" class="form-control" type="text" name="comment" placeholder="{{ __('Komentaras (ne daugiau 160 simbolių)') }}"></textarea>
                        <button class="btn bg-success mt-1">{{ __('Komentuoti') }}</button>
                    </div>
                </form>
                    @else
                            <h4 class="mt-2">{{ __('Norėdami rašyti komentarą turite prisijungti') }}</h4>
                    @endif
                    </div>
                    <div class="col-md-6 mt-2">
                       <h4>{{ __('Visi komentarai') }} @if($comments->count()>0) ({{$comments->count()}})@endif</h4>
                        @if ($comments->isEmpty() )
                            <p class="mb-0">{{ __('Kol kas komentarų nėra.') }} </p>
                        @endif

                        @foreach($comments as $comment)
                         <div class="d-flex">
                          <h6 class="mx-2"><b> {{$comment->user->name}} {{$comment->user->surname}} </b></h6>
                            <h6>{{$comment->created_at}}</h6>
                         </div>
                            <div class="mb-3">

                           <p class="mb-0"> {{$comment->comment}}</p>

                                <div class="d-flex">


                                    @if(Auth::user() != null && !$comment->likedBy(auth()->user()))
                                    <form action="{{ route('like', $comment->id) }}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="post_id" value="{{$comment->id}}">
                                        <button class="mx-1 mt-0 btn btn-link px-0 py-0 "><i class="fa-regular fa-thumbs-up mt-1"></i>
                                        </button>
                                    </form>
                                    @elseif(Auth::user() != null)
                                    <form action="{{ route('unlike', $comment->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <input type="hidden" name="post_id" value="{{$comment->id}}">
                                        <button class="mx-1 mt-0 btn btn-link px-0 py-0"><i class="fa-regular fa-thumbs-down mx-2 mt-1"></i></i>
                                        </button>
                                    </form>
                                    @endif


                                @if(Auth::user() != null && Auth::user()->id == $comment->user_id)
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="mx-1 mt-0 btn btn-link px-0 py-0 text-danger"><i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                    @endif
                                        <p class="mx-1 text-primary"><b>@if($comment->likes->count()>0)+ {{$comment->likes->count()}}@endif</b></p>
                                </div>
                    </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-end mt-2">{{ $comments->links() }}</div>

                </div>
            </div>




    </div>

@endsection

