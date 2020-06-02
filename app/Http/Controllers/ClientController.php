<?php

// ClientController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ClientCollection;
use App\Client;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        $client = new Client([
            'company' => $request->get('company'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname')
        ]);

        $client->save();

        return response()->json('successfully added');
    }
    public function index()
    {
        return new ClientCollection(Client::all());
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return response()->json($client);
    }

    public function update($id, Request $request)
    {
        $client = Client::find($id);

        $client->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $client = Client::find($id);

        $client->delete();

        return response()->json('successfully deleted');
    }
}
