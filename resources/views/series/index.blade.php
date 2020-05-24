@extends('layout')

@section('cabecalho')
    Séries    
@endsection

@section('conteudo')

@include('mensagem', ['mensagem' => $mensagem])

@auth    
    <a href="{{ route('form_criar_serie') }}" class="btn btn-primary mb-4">Adicionar</a>
@endauth
    <ul class="list-group">

        @foreach ($series as $serie)
        
            <li class="list-group-item d-flex justify-content-between align-items-center">
            
                <span id="nome-serie-{{ $serie->id }}">
                    <a href="/series/{{ $serie->id }}/temporadas">{{ $serie->nome }} </a>
                </span>

                <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                    <input type="text" class="form-control" value="{{ $serie->nome }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>

                
                @auth
                <span class="d-flex">

                    <button class="btn btn-info btn-sm mr-2" onclick="toggleInput({{$serie->id}})">
                        <i class="fas fa-edit"></i>
                    </button>
                    
                    <form method="POST"
                        action="/series/{{$serie->id}}"
                        onsubmit="return confirm(
                                'Tem certeza que deseja excluir esta série {{ addslashes($serie->nome)}}?'
                        )">
    
                        @csrf
                        @method('DELETE')
                        <button href="" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </span>
                @endauth
            </li>

        @endforeach

    </ul>


    <script>

        function toggleInput(serieId){
            const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
            const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);

            if(nomeSerieEl.hasAttribute('hidden')){
                nomeSerieEl.removeAttribute('hidden');
                inputSerieEl.hidden = true;
            }else{
                inputSerieEl.removeAttribute('hidden');
                nomeSerieEl.hidden = true;
            }
        }


        function editarSerie(serieId){
            //cria um formulario
            let formData = new FormData();

            //pega o valor do nome da serie
            const nome = document.querySelector(`#input-nome-serie-${serieId} > input`)
                            .value;
            //pega o valor do token
            const token = document.querySelector('input[name="_token"]')
                            .value;                
            //define a url da rota    
            const url = `/series/${serieId}/edita-nome`;

            //adiciona o nome no formulario
            formData.append('nome', nome);
            //adiciona o token no formulario
            formData.append('_token', token);

            fetch(url,{
                body:formData,
                method:'POST'
            }).then(() => {
                toggleInput(serieId);
                const nomeSerieEl = document.querySelector(`#nome-serie-${serieId} > a`)
                    .textContent = nome;
            })
        }
    </script>

@endsection
