<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Http\Request;

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

      //  dd($find);

        $posts=Post::findPosts($find)->latest()->paginate(4);
        $postai=Post::latest()->paginate(20);

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai, 'find'=>$find]);
    }

    public function basketball()
    {
        $posts=Post::where('category_id', 1)->latest()->paginate();
        $postai=Post::where('category_id', 1)->latest()->paginate();

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai]);
    }
    public function euroleague()
    {
        $posts=Post::where('subcategory_id', 1)->latest()->paginate();
        $postai=Post::where('subcategory_id', 1)->latest()->paginate();

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai]);
    }
    public function lkl()
    {
        $posts=Post::where('subcategory_id', 2)->latest()->paginate();
        $postai=Post::where('subcategory_id', 2)->latest()->paginate();

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai]);
    }
    public function nba()
    {
        $posts=Post::where('subcategory_id', 3)->latest()->paginate();
        $postai=Post::where('subcategory_id', 3)->latest()->paginate();

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai]);
    }

    public function football()
    {
        $posts=Post::where('category_id', 2)->latest()->paginate();
        $postai=Post::where('category_id', 2)->latest()->paginate();

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai]);
    }

    public function premier()
    {
        $posts=Post::where('subcategory_id', 4)->latest()->paginate();
        $postai=Post::where('subcategory_id', 4)->latest()->paginate();

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai]);
    }
    public function alyga()
    {
        $posts=Post::where('subcategory_id', 5)->latest()->paginate();
        $postai=Post::where('subcategory_id', 5)->latest()->paginate();

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai]);
    }
    public function champions()
    {
        $posts=Post::where('subcategory_id', 6)->latest()->paginate();
        $postai=Post::where('subcategory_id', 6)->latest()->paginate();

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai]);
    }
    public function wc2022()
    {
        $posts=Post::where('subcategory_id', 7)->latest()->paginate();
        $postai=Post::where('subcategory_id', 7)->latest()->paginate();

        return view('posts.index',['posts'=>$posts, 'postai'=>$postai]);
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
    public function show(Post $post)
    {

        $comments=Comment::where('post_id', $post->id)->withCount('likes')->orderBy('likes_count', 'desc')->paginate();

        return view("posts.show",['post'=>$post, 'comments'=>$comments]);

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
