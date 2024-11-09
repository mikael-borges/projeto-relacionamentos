<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('projects', [ProjectController::class, 'listar']);
Route::get('projects/criar', [ProjectController::class, 'criar']);
Route::post('projects', [ProjectController::class, 'salvar']);
Route::get('projects/{id}/editar', [ProjectController::class, 'editar']);
Route::put('projects/{id}', [ProjectController::class, 'atualizar']);
Route::delete('projects/{id}', [ProjectController::class, 'deletar']);

Route::get('clients', [ClientController::class, 'listar']);
Route::get('clients/criar', [ClientController::class, 'criar']);
Route::post('clients', [ClientController::class, 'salvar']);
Route::get('clients/{id}/editar', [ClientController::class, 'editar']);
Route::put('clients/{id}', [ClientController::class, 'atualizar']);
Route::delete('clients/{id}', [ClientController::class, 'deletar']);