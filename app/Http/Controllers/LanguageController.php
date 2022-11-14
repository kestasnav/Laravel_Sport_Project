<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public  function setLanguage($lang, Request $request)
    {
        $request->session()->put('lang',$lang);
        return redirect()->back();
    }
}
