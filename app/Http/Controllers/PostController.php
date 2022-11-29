<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Fixture;
use App\Models\Like;
use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $find=$request->session()->get('find_post',$request->search);

        $posts=Post::where('type','unhide')->findPosts($find)->latest()->paginate(6);
        $postai=Post::where('type','unhide')->latest()->paginate(8);
        $mostRead=Post::where('type','unhide')->orderBy('reads', 'desc')->latest()->paginate(5);
        $skaitomiausi='';

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai, 'mostRead'=>$mostRead, 'skaitomiausi'=>$skaitomiausi]);
    }

    public function mostReadPosts(Request $request) {
        $find=$request->session()->get('find_post',$request->search);
        $posts=Post::where('type','unhide')->findPosts($find)->orderBy('reads', 'desc')->latest()->paginate(10);
        $postai=Post::where('type','unhide')->latest()->paginate(10);
        $mostRead=Post::where('type','unhide')->orderBy('reads', 'desc')->latest()->paginate(5);
        $skaitomiausi='';
        return view('posts.index',['posts'=>$posts, 'postai'=>$postai, 'mostRead'=>$mostRead,'skaitomiausi'=>$skaitomiausi]);
    }

    public function basketball(Request $request)
    {
        $find=$request->session()->get('find_post',$request->search);
        $posts=Post::where('category_id', 1)->where('type','unhide')->findPosts($find)->latest()->paginate();
        $postai=Post::where('category_id', 1)->where('type','unhide')->latest()->paginate();
        $mostRead=Post::where('category_id', 1)->where('type','unhide')->orderBy('reads', 'desc')->latest()->paginate(5);

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai, 'mostRead'=>$mostRead]);
    }
    public function euroleague(Request $request)
    {
        $find=$request->session()->get('find_post',$request->search);
        $posts=Post::where('subcategory_id', 1)->where('type','unhide')->findPosts($find)->latest()->paginate();
        $postai=Post::where('subcategory_id', 1)->where('type','unhide')->latest()->paginate();
        $mostRead=Post::where('subcategory_id', 1)->where('type','unhide')->orderBy('reads', 'desc')->latest()->paginate(5);

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai, 'mostRead'=>$mostRead]);
    }
    public function lkl(Request $request)
    {
        $find=$request->session()->get('find_post',$request->search);
        $posts=Post::where('subcategory_id', 2)->where('type','unhide')->findPosts($find)->latest()->paginate();
        $postai=Post::where('subcategory_id', 2)->where('type','unhide')->latest()->paginate();
        $mostRead=Post::where('subcategory_id', 2)->where('type','unhide')->orderBy('reads', 'desc')->latest()->paginate(5);

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai, 'mostRead'=>$mostRead]);
    }
    public function nba(Request $request)
    {
        $find=$request->session()->get('find_post',$request->search);
        $posts=Post::where('subcategory_id', 3)->where('type','unhide')->findPosts($find)->latest()->paginate();
        $postai=Post::where('subcategory_id', 3)->where('type','unhide')->latest()->paginate();
        $mostRead=Post::where('subcategory_id', 3)->where('type','unhide')->orderBy('reads', 'desc')->latest()->paginate(5);
        $fixtures=Fixture::all();

//        $date=Fixture::pluck('date')->addHours(7);
//            $datez= Carbon::parse($request->date)->addHours(7);



        return view('posts.index',['posts'=>$posts, 'postai'=>$postai, 'mostRead'=>$mostRead, 'fixtures'=>$fixtures]);
    }

    public function football(Request $request)
    {
        $find=$request->session()->get('find_post',$request->search);
        $posts=Post::where('category_id', 2)->where('type','unhide')->findPosts($find)->latest()->paginate();
        $postai=Post::where('category_id', 2)->where('type','unhide')->latest()->paginate();
        $mostRead=Post::where('category_id', 2)->where('type','unhide')->orderBy('reads', 'desc')->latest()->paginate(5);

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai, 'mostRead'=>$mostRead]);
    }

    public function premier(Request $request)
    {
        $find=$request->session()->get('find_post',$request->search);
        $posts=Post::where('subcategory_id', 4)->where('type','unhide')->findPosts($find)->latest()->paginate();
        $postai=Post::where('subcategory_id', 4)->where('type','unhide')->latest()->paginate();
        $mostRead=Post::where('subcategory_id', 4)->where('type','unhide')->orderBy('reads', 'desc')->latest()->paginate(5);

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai, 'mostRead'=>$mostRead]);
    }
    public function lithuania(Request $request)
    {
        $find=$request->session()->get('find_post',$request->search);
        $posts=Post::where('subcategory_id', 5)->where('type','unhide')->findPosts($find)->latest()->paginate();
        $postai=Post::where('subcategory_id', 5)->where('type','unhide')->latest()->paginate();
        $mostRead=Post::where('subcategory_id', 5)->where('type','unhide')->orderBy('reads', 'desc')->latest()->paginate(5);

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai, 'mostRead'=>$mostRead]);
    }
    public function champions(Request $request)
    {
        $find=$request->session()->get('find_post',$request->search);
        $posts=Post::where('subcategory_id', 6)->where('type','unhide')->findPosts($find)->latest()->paginate();
        $postai=Post::where('subcategory_id', 6)->where('type','unhide')->latest()->paginate();
        $mostRead=Post::where('subcategory_id', 6)->where('type','unhide')->orderBy('reads', 'desc')->latest()->paginate(5);

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai, 'mostRead'=>$mostRead]);
    }
    public function wc2022(Request $request)
    {
        $find=$request->session()->get('find_post',$request->search);
        $posts=Post::where('subcategory_id', 7)->where('type','unhide')->findPosts($find)->latest()->paginate();
        $postai=Post::where('subcategory_id', 7)->where('type','unhide')->latest()->paginate();
        $mostRead=Post::where('subcategory_id', 7)->where('type','unhide')->orderBy('reads', 'desc')->latest()->paginate(5);

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai, 'mostRead'=>$mostRead]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        return view('posts.create',['categories'=>$categories, 'subcategories'=>$subcategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();

        $foto=$request->file('img');

        $fotoname=$request->category_id.'_'.$request->subcategory_id.'_'.rand().'.'.$foto->extension();

        $post->title=$request->title;
        $post->post=$request->post;
        $post->img=$fotoname;
        $post->user_id=$request->user_id;
        $post->category_id=$request->category_id;
        $post->subcategory_id=$request->subcategory_id;


        $foto->storeAs('images',$fotoname);
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function show(Post $post, Request $request )
    {
        $comments=Comment::where('post_id', $post->id)->withCount('likes')->orderBy('likes_count', 'desc')->paginate();
        if(! Auth::check()){//guest user identified by ip
            $cookie_name = (Str::replace('.','',($request->ip())).'-'. $post->id);
        } else {
            $cookie_name = (Auth::user()->id.'-'. $post->id);//logged in user
        }
        if(Cookie::get($cookie_name) == ''){//check if cookie is set
            $cookie = cookie($cookie_name, '1', 60);//set the cookie
            $post->incrementReadCount();//count the view
            return response()
                ->view('posts.show',[
                    'post' => $post, 'comments'=>$comments])
                ->withCookie($cookie);//store the cookie
        } else {
            return  view('posts.show',[
                'post' => $post, 'comments'=>$comments]);//this view is not counted
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories=Category::all();
        $subcategories=Subcategory::all();
        return view("posts.update",['post'=>$post,'categories'=>$categories, 'subcategories'=>$subcategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($request->file('img')!=null) {
            $foto = $request->file('img');

            $fotoname = $request->category_id . '_' . $request->subcategory_id . '_' . rand() . '.' . $foto->extension();
            $foto->storeAs('images',$fotoname);
            $post->img=$fotoname;
        }

        $post->title=$request->title;
        $post->post=$request->post;

        $post->user_id=$request->user_id;
        $post->category_id=$request->category_id;
        $post->subcategory_id=$request->subcategory_id;



        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function display($name){
        $file=storage_path('app/images/'.$name);
        return response()->file( $file );
    }

    public function findPost(Request $request) {
        $request->session()->put('find_post', $request->title);
        return redirect()->route('posts.index');
    }
}
