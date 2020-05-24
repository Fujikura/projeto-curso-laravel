
@extends('layout')

@section('cabecalho')
    Registrar usuário
@endsection


@section('conteudo')

@include('erros');

<form class="form-group" method="POST">

     @csrf
    <div class="row">
        <div class="col col-md-12">
            <label for="name">Nome</label>     
            <input type="text" name="name" required class="form-control"/>
        </div>    
    </div>

    <div class="row">
        <div class="col col-md-12">
            <label for="email">E-mail</label>     
            <input type="email" name="email" required class="form-control"/>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-12">
            <label for="password">Senha</label>     
            <input type="password" name="password" required class="form-control"/>
        </div>
    </div>
        
    <button type="submit" class="btn btn-primary btn-lg mt-4">
        Registrar
    </button>
</form>

@endsection