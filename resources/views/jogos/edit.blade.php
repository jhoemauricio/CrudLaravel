<!--extende de layout/app-->
@extends('layouts.app')

@section('title','Edição');

<!--tudo que for digitado aqui dentro sera renderizado  no template-->
@section('content')
<div class="container mt-5"></div>
<h1>Editar jogo</h1>
<hr>
<form action="{{route('jogos-update',['id'=>$jogos->id])}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group"> 
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" value="{{$jogos->nome}}" placeholder="Digite um nome">
        </div>
    </div>

    <div class="form-group"> 
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" class="form-control" name="categoria" value="{{$jogos->categoria}}" placeholder="Digite uma categoria">
        </div>
    </div>

    <div class="form-group"> 
        <div class="form-group">
            <label for="ano_criacao">Ano de criação</label>
            <input type="number" class="form-control" name="ano_criacao" value="{{$jogos->ano_criacao}}" placeholder="Ano de Criação">
        </div>
    </div>

    <div class="form-group"> 
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" class="form-control" name="valor" value="{{$jogos->valor}}" placeholder="Valor">
        </div>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
    </div>

</form>


@endsection