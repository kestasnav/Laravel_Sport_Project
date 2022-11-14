<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public  function like(Request $request, Comment $comment)
    {

        $comment->likes()->create([
            'user_id' => $request->user()->id,
            'comment_id'=>$request->comment_id
        ]);

        return redirect()->back();
    }
    public  function unlike(Request $request, Comment $comment)
    {

       $request->user()->likes()->where('comment_id',$comment->id)->delete();
        return redirect()->back();
    }
}
