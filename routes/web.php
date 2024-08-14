<?php

use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas para Atividades
Route::get('/atividades', [AtividadeController::class, 'index'])->name('atividades.index');
Route::get('/atividades/create', [AtividadeController::class, 'create'])->name('atividades.create');
Route::post('/atividades', [AtividadeController::class, 'store'])->name('atividades.store');
Route::get('/atividades/edit/{id}', [AtividadeController::class, 'edit'])->name('atividades.edit');
Route::patch('/atividades/update/{id}', [AtividadeController::class, 'update'])->name('atividades.update');
Route::delete('/atividades/delete/{id}', [AtividadeController::class, 'destroy'])->name('atividades.destroy');

// Rotas para Tarefas
Route::get('/tarefas', [TarefaController::class, 'index'])->name('tarefas.index');
Route::get('/tarefas/create', [TarefaController::class, 'create'])->name('tarefas.create');
Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
Route::get('/tarefas/edit/{id}', [TarefaController::class, 'edit'])->name('tarefas.edit');
Route::patch('/tarefas/update/{id}', [TarefaController::class, 'update'])->name('tarefas.update');
Route::delete('/tarefas/delete/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');

require __DIR__.'/auth.php';
