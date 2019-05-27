<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FingerprintRequest;
use App\User;
use App\Client;

class FingerprintsController extends Controller
{
    public function index()
    {
        $requests = FingerprintRequest::orderBy('created_at', 'desc')->paginate(20);

        return view('fingerprints.index', compact('requests'));
    }

    public function destroy(FingerprintRequest $fingerprint)
    {
        $fingerprint->delete();

        return redirect()->route('fingerprints.index');
    }

    public function editUser(User $user)
    {
        $clients = Client::all();

        return view('fingerprints.user', compact('user', 'clients'));
    }

    public function saveUser(Request $request, User $user)
    {
        $client = intval($request->post('client', 0));
        if ($client === 0) {
            return redirect()->back();
        }

        $req = new FingerprintRequest;
        $req->user_id = $user->id;
        $req->client_id = $client;
        $req->fingerprint = '0';
        $req->status = 'waiting';
        $req->save();

        send_fingerprint_request($req->client->ip, $req->client->port, $req->id);

        return redirect()->route('fingerprints.index');
    }

    public function resend(FingerprintRequest $req)
    {
        send_fingerprint_request($req->client->ip, $req->client->port, $req->id);

        return redirect()->route('fingerprints.index');
    }
}
