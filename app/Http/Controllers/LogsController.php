<?php

namespace App\Http\Controllers;

use App\SignLog;

class LogsController extends Controller
{
    public function index()
    {
        $logs = SignLog::orderBy('created_at', 'desc')->paginate(20);

        return view('logs.index', compact('logs'));
    }
}
