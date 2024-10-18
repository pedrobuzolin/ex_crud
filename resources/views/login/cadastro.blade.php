@extends("layout_adm.topo_rodape")
@section("conteudo")
<form method="POST" action="{{ route('add_user') }}">
    @csrf
    <input type="text" name="name" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Senha" required>
    <input type="password" name="password_confirmation" placeholder="Confirme a Senha" required>
    <button type="submit">Registrar</button>
</form>
@endsection