<?php

namespace App\Http\Controllers;

use App\FingerprintRequest;

class FingerprintsController extends Controller
{
    public function index()
    {
        $requests = FingerprintRequest::orderBy('created_at', 'desc')->paginate(20);

        return view('fingerprints.index', compact('requests'));
    }

    public function destory(FingerprintRequest $fingerprint)
    {
        $fingerprint->delete();

        return redirect()->route('fingerprints.index');
    }
}
