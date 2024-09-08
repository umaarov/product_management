<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string|max:15',
        ]);

        Client::create($request->only(['name', 'email', 'phone']));

        return redirect()->route('clients.index')->with('success', 'Client created successfully');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'required|string|max:15',
        ]);

        $client->update($request->only(['name', 'email', 'phone']));

        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    public function destroy(Client $client)
    {
        if ($client->sales()->count() > 0) {
            return redirect()->route('clients.index')->withErrors('Cannot delete client with associated sales.');
        }

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully');
    }
}
