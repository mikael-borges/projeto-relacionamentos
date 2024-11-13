<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function listar()
{
    $projects = Project::all();
    return view('projects.index', compact('projects'));
}

public function criar()
{
    $clients = Client::all();
    return view('projects.create', compact('clients'));
}

public function salvar(Request $request)
{
    Project::create($request->all());
    return redirect('projects')->with('success', 'Product created successfully.');
}

public function editar($id)
{
    $project = Project::findOrFail($id);
    $clients = Client::all();
    return view('projects.edit', compact('project', 'clients'));
}

public function atualizar(Request $request, $id)
{
    $project = Project::findOrFail($id);
    $project->update($request->all());
    return redirect('projects')->with('success', 'Projeto atualizado com sucesso.');
}

public function deletar($id)
{
    $projects = Project::findOrFail($id);
    $projects->delete();
    return redirect('projects')->with('success', 'Product deleted successfully.');
}
}
