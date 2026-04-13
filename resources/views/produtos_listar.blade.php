@extends('main')

@section('titulo', 'Lista de Produtos')

@section('conteudo')
<h1>Produtos</h1>
@if (session()->has('mensagem'))
@if (session()->has('alert-type'))
<div class="alert alert-danger">
    @else
    <div class="alert alert-warning">
        @endif
        {{ session('mensagem') }}
    </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Estoque</th>
                <th>Valor</th>
                <th>Categoria</th>
                <th>Data criação</th>
                <th>Operações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->nome }}</td>
                <td>{{ $p->estoque }}</td>
                <td>{{ $p->valor }}</td>
                <td>{{ $p->categoria ? $p->categoria->nome : 'Sem categoria' }}</td>
                <td>{{ $p->created_at }}</td>
                <td>
                    <a href="{{ route('prod.edit', ['id' => $p->id]) }}"
                        class="btn btn-warning">
                        Alterar</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $p->id }}">
                        Excluir
                    </button>
                </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="modalDelete{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirme Exclusão</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Tem certeza que deseja excluir <b>{{$p->nome}}</b>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <a href="{{route('prod.delete', ['id' => $p->id])}}" class="btn btn-outline-danger">Sim, exlcuir</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

    <div>
        <a class="btn btn-success"
            href="{{ route('prod.novo') }}">
            Novo produto</a>
    </div>
    @endsection