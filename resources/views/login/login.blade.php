@extends('layout_adm.topo_rodape')
@section('conteudo')
    <div class="card col-8 mt-5">
        <form method="POST" action="{{ route('vld_login') }}">
            @csrf
            <input class="form-control" type="email" name="email" placeholder="Email" required>
            <input class="form-control" type="password" name="password" placeholder="Senha" required>
            <button class="btn btn-success" type="submit">Login</button>
        </form>
        <a href="{{ route('register') }}" class="btn btn-warning">NOVO</a>
    <div>
@endsection
