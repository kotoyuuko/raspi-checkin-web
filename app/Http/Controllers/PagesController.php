<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function root()
    {
        if (!Auth::guest()) {
            return redirect()->route('pages.home');
        }

        return view('pages.root');
    }

    public function home()
    {
        return view('pages.home');
    }
}
