
@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection


@section('conteudo')

@include('erros');

<form class="form-group" method="POST">

     @csrf
    <div class="row">
        <div class="col col-md-8">
            <label for="nome">Nome</label>     
            <input type="text" name="nome" id="nome" class="form-control"/>
        </div>

        <div class="col col-md-2">
            <label for="qtd_temporadas">Temporadas</label>     
            <input type="number" name="qtd_temporadas" id="qtd_temporadas" class="form-control"/>
        </div>

        <div class="col col-md-2">
            <label for="ep_por_temporada">Ep. por Temporada</label>     
            <input type="number" name="ep_por_temporada" id="ep_por_temporada" class="form-control"/>
        </div>
    </div>
        
    <button class="btn btn-primary mt-2">Adicionar</button>
</form>

@endsection