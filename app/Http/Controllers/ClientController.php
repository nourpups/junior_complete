<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{

   public function __construct()
   {
      $this->authorizeResource(Client::class, 'client');
   }

   /**
     * Display a listing of the resource.
     */
    public function index()
    {

        session()->put('index_page', url()->full());

        $clients = Client::with('projects')->latest()->paginate(12);

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
       Client::create($client = $request->validated());

        return redirect(session('index_page'))->with('flash', [
            'class' => 'success',
            'message' => "Client $client[name] was created successfully",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        return redirect(session('index_page'))->with('flash', [
            'class' => 'success',
            'message' => "Client $client[name] was updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $name = $client->name;

        $client->delete();

        return redirect(session('index_page'))->with('flash', [
            'class' => 'danger',
            'message' => "Client $name deleted"
        ]);
    }
}
