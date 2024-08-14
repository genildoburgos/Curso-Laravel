<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use Illuminate\Http\Request;

class AtividadeController extends Controller
{
    public function index(){
        $atividades = Atividade::all();
        return view('atividade.index', compact('atividades'));
    }

    public function create(){
        return view('atividade.create');
    }

    public function store(Request $request){
        $atividade = new Atividade();
        $atividade->save();

        return redirect()->route('atividade.index');
    }

    public function edit($id){
        $atividade = Atividade::find($id);
        return view('atividade.edit', compact('atividade'));
    }

    public function update(Request $request, $id){
        $atividade = Atividade::find($id);
        $atividade->update($request->all());
        $atividade->save();

        return redirect()->route('atividade.index');
    }

    public function destroy($id){
        $atividade = Atividade::find($id);
        $atividade->delete();
        return redirect()->route('atividade.index');
    }
}
