<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function(){
   return view("layout_adm.index"); 
});

Route::get('/categoria', [CategoriaController::class, 'index']);
Route::get('/categoria/exc/{id}', [CategoriaController::class, 'excluirCategoria'])->name('categoria_ex');
Route::get('/categoria/upd/{id}', [CategoriaController::class, 'buscarAlteracao'])->name('categoria_upd');
Route::post('/categoria', [CategoriaController::class, 'incluirCategoria']);
Route::post('/categoria/upd', [CategoriaController::class, 'executarAlteracao']);

Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos_index');
Route::get('/produtos/exc/{id}', [ProdutoController::class, 'excluirProduto'])->name('produto_ex');
Route::get('/produtos/upd/{id}', [ProdutoController::class, 'formularioAlterar'])->name('produto_upd');
Route::post('/produtos/upd', [ProdutoController::class, 'salvarAlterarProduto']);
Route::post('/produtos', [ProdutoController::class, 'salvarNovoProduto'])->name('novo-produto');