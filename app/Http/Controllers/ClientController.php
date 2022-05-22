<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index')->with('clients', Client::all()->sortByDesc('id'));
    }

    public function create()
    {
        return view('clients.create')->with('client', new Client);
    }

    public function store(ClientRequest $request)
    {
        if(! $client = Client::create( $request->validated() ) )
            return back()->with('danger', 'Ups! client not saved');

        return redirect()->route('clients.index')->with('success', "{$client->fullname} client saved");
    }

    public function show(Client $client)
    {
        return view('clients.show')->with('client', $client);
    }

    public function edit(Client $client)
    {
        return view('clients.edit')->with('client', $client);
    }

    public function update(ClientRequest $request, Client $client)
    {
        if(! $client->fill( $request->validated() )->save() )
            return back()->with('danger', 'Ups! client not updated');

        return redirect()->route('clients.edit', $client)->with('success', "{$client->fullname} client updated");
    }

    public function destroy(Client $client)
    {
        try {
            $client->delete();
            return redirect()->route('clients.index')->with('success', "{$client->fullname} client deleted");
        }
        catch (\Exception $e) {
            return back()->with('danger', 'Ups! client not deleted, make sure this client still not has works.');
        }
    }
}
