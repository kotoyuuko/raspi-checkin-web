<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Client;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(20);

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.form');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $client = new Client;
        $client->name = $data['name'];
        $client->ip = $data['ip'];
        $client->port = intval($data['port']);
        $client->token = $data['token'] ? $data['token'] : Str::random(16);
        $client->save();

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('clients.form', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->all();

        $client->name = $data['name'];
        $client->ip = $data['ip'];
        $client->port = intval($data['port']);
        $client->token = $data['token'] ? $data['token'] : Str::random(16);
        $client->save();

        return redirect()->route('clients.index');
    }
}
