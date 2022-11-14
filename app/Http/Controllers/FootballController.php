<?php

namespace App\Http\Controllers;

use App\Models\Football;
use App\Models\Post;
use Illuminate\Http\Request;

class FootballController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all()->where('subcategory_id', '==', 2);
        return view('football.index',['posts'=>$posts]);
    }

    public function premier()
    {
        return view('football.index',['posts'=>Post::where('subcategory_id',4)->get()]);
    }
    public function alyga()
    {
        return view('football.index',['posts'=>Post::where('subcategory_id',5)->get()]);
    }
    public function champions()
    {
        return view('football.index',['posts'=>Post::where('subcategory_id',6)->get()]);
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
     * @param  \App\Models\Football  $football
     * @return \Illuminate\Http\Response
     */
    public function show(Football $football)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Football  $football
     * @return \Illuminate\Http\Response
     */
    public function edit(Football $football)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Football  $football
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Football $football)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Football  $football
     * @return \Illuminate\Http\Response
     */
    public function destroy(Football $football)
    {
        //
    }
}
