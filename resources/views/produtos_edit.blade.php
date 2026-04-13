@extends('main')

@section('titulo', "Produto #{$p->id}")

@section('conteudo')
<h1>Produto #{{ $p->id }}</h1>
<form method="POST" action="{{ route('prod.salvar', ['id' => $p->id]) }}">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control"
            id="nome" placeholder="Nome" name="nome" value="{{ $p->nome }}">
        <label for="nome">Nome</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="estoque"
            placeholder="Estoque" name="estoque" value="{{ $p->estoque }}">
        <label for="estoque">Estoque</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="valor" value="{{ $p->valor }}" placeholder="Valor" step="0.01" name="valor">
        <label for="valor">Valor</label>
    </div>
    <div class="mb-3">
        <label for="categoria_id" class="form-label">Categoria existente</label>
        <select class="form-select" id="categoria_id" name="categoria_id">
            <option value="">Selecione uma categoria</option>
            @foreach ($categorias as $c)
            <option value="{{ $c->id }}" {{ $p->categoria_id == $c->id ? 'selected' : '' }}>
                {{ $c->nome }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nova_categoria" placeholder="Nova categoria" name="nova_categoria">
        <label for="nova_categoria">Nova categoria</label>
        <div class="form-text">Informe se quiser criar uma nova categoria para este produto.</div>
    </div>
    <input type="submit" value="Salvar"
        class="btn btn-success" />
</form>
@endsection