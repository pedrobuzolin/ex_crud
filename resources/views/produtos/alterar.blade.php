@extends('layout_adm.index')
@section('admin_template')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Produtos</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Produtos</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Alteração de Produtos
            </div>
            <div class="card-body">
                <form method="POST" action="/produtos/upd">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$produto->id}}">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <select class="form-select" aria-label="Default select example" name="cat_id" id="cat_id">
                                <option selected value="{{ $produto->cat_id }}">{{ $produto->categoria->cat_nome }}</option>
                                @foreach ($categorias as $linha)
                                    <option value="{{ $linha->id }}">{{ $linha->cat_nome }}</option>
                                @endforeach
                            </select>
                            <label for="floatingInput">Categoria</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="prod_nome" id="prod_nome"
                                placeholder="Digite o nome da Categoria" value="{{$produto->prod_nome}}">
                            <label for="floatingInput">Produto</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="prod_descricao" id="prod_descricao"
                                placeholder="Digite a descrição" value="{{$produto->prod_descricao}}">
                            <label for="floatingInput">Descrição</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="prod_quantidade" id="prod_quantidade"
                                placeholder="Digite o nome da Categoria" value="{{$produto->prod_quantidade}}">
                            <label for="floatingInput">Quantidade</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
