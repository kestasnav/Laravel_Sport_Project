<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()) {
            if (Auth::user()->email_verified_at != null) {
                return redirect()->route('posts.index');
            } else {
                return view('auth.verify');
            }
        } else {
            return redirect()->route('posts.index');
        }
    }
}
