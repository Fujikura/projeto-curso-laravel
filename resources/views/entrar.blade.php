@extends('layout')

@section('cabecalho')
    Auntenticar
@endsection

@section('conteudo')

@include('erros')

    <form method="POST">

        @csrf

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary btn-lg">
            Entrar
        </button>
        <a href="/registrar" class="btn btn-secondary btn-lg">
            Registre-se
        </a>

    </form>

@endsection