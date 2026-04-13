@extends('main')

@section('titulo', "Fornecedor #{$f->id}")

@section('conteudo')
<h1>Fornecedor #{{ $f->id }}</h1>
<form method="POST" action="{{ route('forn.salvar', ['id' => $f->id]) }}">
    @csrf
    <div class="form-floating mb-3">
    <input type="text" class="form-control" 
    id="nome" placeholder="Nome" name="nome" value="{{ $f->nome }}">
    <label for="nome">Nome</label>
    </div>
    <div class="form-floating mb-3">
    <input type="email" class="form-control" id="email" 
    placeholder="Email" name="email" value="{{ $f->email }}">
    <label for="email">Email</label>
    </div>
    <div class="form-floating mb-3">
    <input type="text" class="form-control" id="telefone" 
    placeholder="Telefone" name="telefone" value="{{ $f->telefone }}">
    <label for="telefone">Telefone</label>
    </div>
    <div class="form-floating mb-3">
    <textarea class="form-control" id="endereco" placeholder="Endereço" name="endereco">{{ $f->endereco }}</textarea>
    <label for="endereco">Endereço</label>
    </div>
    <input type="submit" value="Salvar" 
        class="btn btn-success" />
</form>
@endsection