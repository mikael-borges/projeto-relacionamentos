@extends('estructures.base')

@section('titulo')
Lista de Projetos
@endsection

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nome do Projeto
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Valor
                </th>
                <th scope="col" class="px-6 py-3">
                    Cliente ID
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    {{ $project->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $project->value }}
                </td>
                <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                    {{ $project->client_id }}
                </td>
                <td class="px-6 py-4 flex gap-2">
                    <form action="{{ url('projects/'.$project->id.'/edit') }}" method="GET" style="display:inline;">
                        <button type="submit" class="text-blue-600 hover:text-blue-900">Editar</button>
                    </form>
                    <form action="{{ url('projects', $project->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection