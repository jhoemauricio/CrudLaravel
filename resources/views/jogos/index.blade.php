<!--extende de layout/app-->
@extends('layouts.app')

@section('title','Listagem');

<!--tudo que for digitado aqui dentro sera renderizado  no template-->
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-10">
            <h1>Listagem de Jogos
        </div>
    </div>

    <div class="col-sm-3">
        <a href="{{route('jogos-create')}}" class="btn btn-success">Novo Jogo</a>
    </div>


    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Ano de Criação</th>
                <th scope="col">Valor</th>
                <th scope="col">...</th>
            </tr>
        </thead>
        <tbody>
            <!--VARIAVEL $jogos vindo do controller 'Jogos'-->
            @foreach($jogos as $jogo)
            <tr>
                <th>{{$jogo->id}}</th>
                <td>{{$jogo->nome}}</td>
                <td>{{$jogo->categoria}}</td>
                <td>{{$jogo->ano_criacao}}</td>
                <td>{{$jogo->valor}}</td>
                <th class="d-flex">
                    <!--variavel 'id' recebe a variavel $jogo -> id, que vai ser passado para a rota ID-->
                    <a href="{{route('jogos-edit',['id'=>$jogo->id])}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                        </svg>
                    </a>



                    <form action="{{route('jogos-destroy',['id'=>$jogo->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                            </svg>
                        </button>
                    </form>

                </th>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
</div>

@endsection