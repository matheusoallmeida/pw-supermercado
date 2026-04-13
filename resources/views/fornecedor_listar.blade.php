@extends('main')

@section('titulo', 'Lista de Fornecedores')

@section('conteudo')
<h1>Fornecedores</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Data criação</th>
            <th>Operações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fornecedores as $f)
        <tr> 
            <td>{{ $f->id }}</td>
            <td>{{ $f->nome }}</td>
            <td>{{ $f->email }}</td>
            <td>{{ $f->telefone }}</td>
            <td>{{ $f->endereco }}</td>
            <td>{{ $f->created_at }}</td>
            <td>
                <a href="{{ route('forn.edit', ['id' => $f->id]) }}" 
                    class="btn btn-warning">
                    Alterar</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $f->id }}">
                Excluir
                </button>
            </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="modalDelete{{ $f->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirme Exclusão</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir <b>{{$f->nome}}</b>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <form method="POST" action="{{ route('forn.delete', ['id' => $f->id]) }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Sim, excluir</button>
                </form>
            </div>
            </div>
        </div>
        </div>
        @endforeach
    </tbody>
</table>
<a href="{{ route('forn.novo') }}" class="btn btn-primary">Novo Fornecedor</a>
@endsection