@extends('main')

@section('titulo', 'Novo fornecedor')

@section('conteudo')
<h1>Novo Fornecedor</h1>
<form method="POST" action="{{ route('forn.salvar') }}">
    @csrf
    <div class="form-floating mb-3">
    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
    <label for="nome">Nome</label>
    </div>
    <div class="form-floating mb-3">
    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
    <label for="email">Email</label>
    </div>
    <div class="form-floating mb-3">
    <input type="text" class="form-control" id="telefone" placeholder="Telefone" name="telefone">
    <label for="telefone">Telefone</label>
    </div>
    <div class="form-floating mb-3">
    <textarea class="form-control" id="endereco" placeholder="Endereço" name="endereco"></textarea>
    <label for="endereco">Endereço</label>
    </div>
    <input type="submit" value="Salvar" 
        class="btn btn-success" />
</form>
@endsection