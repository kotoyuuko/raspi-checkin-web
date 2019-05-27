<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SignLog;
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
        $user = Auth::user();
        $logs = SignLog::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(20);

        return view('pages.home', compact('user', 'logs'));
    }
}
