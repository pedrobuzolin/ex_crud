<?php
namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::where('prod_ativo', '1')->with('categoria')->get();
        $categorias = Categoria::where('cat_ativo', '1')->get();

        return view('produtos.index', compact('produtos', 'categorias'));
    }

    public function salvarNovoProduto(Request $request)
    {
        $request->validate([
            'cat_id' => 'required|exists:categoria,id',
            'prod_nome' => 'required|string|max:255',
            'prod_quantidade' => 'required|integer',
            'prod_descricao' => 'nullable|string',
        ]);

        Produto::create($request->all());
        return redirect()->route('produtos_index')->with('success', 'Produto criado com sucesso!');
    }

    public function detalhesProduto(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function formularioAlterar($id)
    {
        $produto = Produto::where("id", $id)->first();
        $categorias = Categoria::where('cat_ativo', '1')->get();
        return view('produtos.alterar', compact('produto', 'categorias'));
    }

    public function salvarAlterarProduto(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:produtos,id',
            'cat_id' => 'required|exists:categoria,id',
            'prod_nome' => 'required|string|max:255',
            'prod_quantidade' => 'required|integer',
            'prod_descricao' => 'nullable|string',
        ]);
        $infoProd = $request->except('id');
        $id = $request['id'];
        $produto = Produto::find($id);
        $produto->update($infoProd);
        return redirect()->route('produtos_index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function excluirProduto($id)
    {
        $produto = Produto::where("id", $id)->first();
        $produto->prod_ativo = 0;
        $produto->save();
        return redirect()->route('produtos_index')->with('success', 'Produto removido com sucesso!');
    }
}