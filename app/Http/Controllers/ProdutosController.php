<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

use function Symfony\Component\String\s;

class ProdutosController extends Controller
{
    function listar()
    {
        $produtos = Produto::all();

        return view(
            'produtos_listar',
            ['produtos' => $produtos]
        );
    }

    function novo()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('produtos_novo', ['categorias' => $categorias]);
    }

    function salvar(Request $req, $id = null)
    {
        if ($id) {
            $p = Produto::findOrFail($id);
            $operacao = 'alterado';
        } else {
            $p = new Produto();
            $operacao = 'inserido';
        }

        $p->nome = $req->nome;
        $p->valor = $req->valor;
        $p->estoque = $req->estoque;

        if ($req->filled('nova_categoria')) {
            $categoria = Categoria::firstOrCreate([
                'nome' => $req->nova_categoria,
            ]);
            $p->categoria_id = $categoria->id;
        } elseif ($req->filled('categoria_id') && $req->categoria_id !== 'null') {
            $p->categoria_id = $req->categoria_id;
        }

        $p->save();

        session()->flash("mensagem", "O Produto {$p->nome} foi {$operacao} com sucesso!");

        return redirect('/produtos');
    }

    function edit($id)
    {
        $p = Produto::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();

        return view('produtos_edit', [
            'p' => $p,
            'categorias' => $categorias,
        ]);
    }

    function delete($id)
    {
        $p = Produto::findOrFail($id);
        $nome = $p->nome;
        $p->delete();

        session()->flash('mensagem', "O Produto {$nome} foi excluído com sucesso!");
        session()->flash('alert-type', 'danger');
        return redirect('/produtos');
    }
}
