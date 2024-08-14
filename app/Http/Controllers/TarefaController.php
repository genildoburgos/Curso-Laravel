<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return view('tarefas.index', ['tarefas' => $tarefas]);
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        // Criação de uma nova tarefa
        $tarefa = new Tarefa();
        $tarefa->save();

        return redirect()->route('tarefas.index');
    }

    public function edit($id)
    {
        // Busca a tarefa pelo ID
        $tarefa = Tarefa::find($id);
        return view('tarefas.edit', ['tarefa' => $tarefa]);
    }

    public function update(Request $request, $id)
    {

        $tarefa = Tarefa::find($id);
        $tarefa->titulo = $request->input('titulo');
        $tarefa->descricao = $request->input('descricao');
        $tarefa->save();

        return redirect()->route('tarefas.index');
    }

    public function destroy($id){
        $tarefa = Tarefa::find($id);
        $tarefa->delete();
        return redirect()->route('tarefas.index');
    }
}
