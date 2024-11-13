<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function listar()
{
    $clients = Client::all();
    return view('clients.index', compact('clients'));
}

public function criar()
{
    return view('clients.create');
}

public function salvar(Request $request)
{
    Client::create($request->all());
    return redirect('clients')->with('success', 'Cliente cadastrado com sucesso.');
}

public function editar($id)
{
    $client = Client::findOrFail($id);
    return view('clients.edit', compact('client'));
}

public function atualizar(Request $request, $id)
{
    $client = Client::findOrFail($id);
    $client->update($request->all());
    return redirect('clients')->with('success', 'Cliente atualizado com sucesso.');
}

public function deletar($id)
{
    $clients = Client::findOrFail($id);
    $clients->delete();
    return redirect('clients')->with('success', 'Cliente deletado com sucesso.');
}
}