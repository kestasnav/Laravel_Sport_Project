<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{







    public function posts(Request $request)
    {


            $posts = Post::latest()->paginate();


            return view('admin.posts', ['posts' => $posts]);

    }

    public function users(Request $request)
    {

        $users=User::paginate();

        return view('admin.users',['users'=>$users]);
    }

    public  function destroyUser( $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message','User deleted successfully');
    }

    public  function role(Request $request, $id)
    {
        $user = User::find($id);
        $user->type=$request->type;
        $user->save();
        return redirect()->back()->with('message','User role changed successfully');
    }

    public  function hide(Request $request, $id)
    {
        $post = Post::find($id);
        $post->type=$request->type;
        $post->save();
        return redirect()->back()->with('message','Post visibility changed successfully');
    }

    public function comments(Request $request)
    {

        $comments=Comment::latest()->paginate();

        return view('admin.comments',['comments'=>$comments]);
    }

    public function products() {
        $products = Product::all();
        return view('admin.products',compact('products'));
    }

}
