<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    function listar(){
        $fornecedores = Fornecedor::all();

        return view('fornecedor_listar', 
            ['fornecedores' => $fornecedores]);
    }

    function novo(){
        return view('fornecedor_novo');
    }

    function salvar(Request $req, $id=null){
        $req->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:fornecedores,email' . ($id ? ',' . $id : ''),
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string',
        ]);

        if ($id) {
            $f = Fornecedor::findOrFail($id);
        } else {
            $f = new Fornecedor();
        }
        $f->nome = $req->nome;
        $f->email = $req->email;
        $f->telefone = $req->telefone;
        $f->endereco = $req->endereco;
        $f->save();

        return redirect('/fornecedores');
    }

    function edit($id){
        $f = Fornecedor::findOrFail($id);

        return view('fornecedor_edit', ['f' => $f]);
    }

    function delete($id){
        Fornecedor::findOrFail($id)->delete();
        return redirect('/fornecedores');
    }
}
