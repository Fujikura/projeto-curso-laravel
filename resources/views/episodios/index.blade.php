@extends('layout')

@section('cabecalho')
    Episódios
@endsection

@section('conteudo')
<form action="/temporadas/{{ $temporadaId }}/episodios/assistir" method="POST">

    @include('mensagem', ['mensagem' => $mensagem])

    @csrf

    <ul class="list-group">
        @foreach ($episodios as $episodio)    
            <li class="list-group-item d-flex justify-content-between">
                Episodios {{ $episodio->numero }}
            
            <input type="checkbox" name="episodios[]" 
                value="{{ $episodio->id }}"
                {{ $episodio->assistido ? 'checked' : '' }}>
            </li>

        @endforeach
    </ul>

    <span class="d-flex justify-content-between">

        <a href="/series" class="btn btn-primary mt-4 mb-4">
            Retornar lista de séries
        </a>

        @auth

            <button class="btn btn-primary mt-4 mb-4">
                Marcar episódios
            </button>

        @endauth

    </span>
    
</form>

@endsection