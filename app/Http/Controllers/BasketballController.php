<?php

namespace App\Http\Controllers;

use App\Models\Basketball;
use App\Models\Post;
use Illuminate\Http\Request;

class BasketballController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all()->where('category_id', '==',1);

        return view('basketball.index',['posts'=>$posts]);
    }
    public function euroleague()
    {
        return view('basketball.index',['posts'=>Post::where('subcategory_id',1)->get()]);
    }
    public function lkl()
    {
        return view('basketball.index',['posts'=>Post::where('subcategory_id',2)->get()]);
    }
    public function nba()
    {
        return view('basketball.index',['posts'=>Post::where('subcategory_id',3)->get()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basketball  $basketball
     * @return \Illuminate\Http\Response
     */
    public function show(Basketball $basketball)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basketball  $basketball
     * @return \Illuminate\Http\Response
     */
    public function edit(Basketball $basketball)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basketball  $basketball
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basketball $basketball)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basketball  $basketball
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basketball $basketball)
    {
        //
    }
}
