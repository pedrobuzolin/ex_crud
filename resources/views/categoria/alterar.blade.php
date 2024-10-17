@extends("layout_adm.index")
@section("admin_template")
<div class="container-fluid px-4">
    <h1 class="mt-4">Categorias</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Categorias</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                    Alteração de Categorias
            </div>
            <div class="card-body">
                <form method="POST" action="/categoria/upd">
                    @csrf
                    <input type="hidden" name="id" value="{{$categoria->id}}">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="cat_nome" id="cat_nome" placeholder="Digite o nome da Categoria" value="{{$categoria->cat_nome}}">
                            <label for="floatingInput">Categoria</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="cat_descricao" id="cat_descricao" placeholder="Digite a descrição" value="{{$categoria->cat_descricao}}">
                            <label for="floatingInput">Descrição</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                </form>
            </div>
        </div>
</div>

@endsection