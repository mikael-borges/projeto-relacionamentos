<?php

namespace App\Http\Controllers;

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
    return view('projects.create');
}

public function salvar(Request $request)
{
    Project::create($request->all());
    return redirect('projects')->with('success', 'Product created successfully.');
}

public function editar($id)
{
    $projects = Project::findOrFail($id);
    return view('projects.edit', compact('projects'));
}

public function atualizar(Request $request, $id)
{
    $projects = Project::findOrFail($id);
    $projects->update($request->all());
    return redirect('projects')->with('success', 'Product updated successfully.');
}

public function deletar($id)
{
    $projects = Project::findOrFail($id);
    $projects->delete();
    return redirect('projects')->with('success', 'Product deleted successfully.');
}
}
