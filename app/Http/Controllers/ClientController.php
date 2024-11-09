<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function listar()
{
    $clientes = Client::all();
    return view('clientes.index', compact('clientes'));
}

public function criar()
{
    return view('clientes.create');
}

public function salvar(Request $request)
{
    Client::create($request->all());
    return redirect('clientes')->with('success', 'Product created successfully.');
}

public function edit($id)
{
    $clientes = Client::findOrFail($id);
    return view('clientes.edit', compact('clientes'));
}

public function atualizar(Request $request, $id)
{
    $clientes = Client::findOrFail($id);
    $clientes->update($request->all());
    return redirect('clientes')->with('success', 'Product updated successfully.');
}

public function deletar($id)
{
    $clientes = Client::findOrFail($id);
    $clientes->delete();
    return redirect('clientes')->with('success', 'Product deleted successfully.');
}
}
