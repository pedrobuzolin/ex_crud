<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        //$categorias = Categoria::all() -> Pega todas as categorias
        //$categorias = Categoria::where("cat_ativo", "1")->get(); => Somente ativos

        $categorias = Categoria::all()->where("cat_ativo", "1");

        return view('categoria.index', compact('categorias'));
    }

    public function incluirCategoria(Request $request)
    {
        $cat_nome = $request->input("cat_nome");
        $cat_descricao = $request->input("cat_descricao");

        $nova = new Categoria;
        $nova->cat_nome = $cat_nome;
        $nova->cat_descricao = $cat_descricao;
        $nova->save();

        return redirect('/categoria');
    }

    public function excluirCategoria($id)
    {
        //SELECT * FROM categoria WHERE id = ID
        $cat = Categoria::where("id", $id)->first();

        //Excluir da base de dados
        //$cat->delete();

        //Exclusão lógica
        $cat->cat_ativo = 0;
        $cat->save();
        return redirect('/categoria');
    }

    public function buscarAlteracao($id)
    {
        $categoria = Categoria::where("id", $id)->first();
        return view('categoria.alterar', compact('categoria'));
    }

    public function executarAlteracao(Request $request)
    {
        $dados_nome = $request->input("cat_nome");
        $dados_desc = $request->input("cat_descricao");
        $dados_id = $request->input("id");

        $categoria = Categoria::where("id", $dados_id)->first();
        $categoria->cat_nome = $dados_nome;
        $categoria->cat_descricao = $dados_desc;
        $categoria->save();

        return redirect('/categoria');
    }
}
