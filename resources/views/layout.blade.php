<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Séries</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">

        <link rel="stylesheet"
              href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
              integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
              crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark d-flex justify-content-between">
        <a class="navbar-brand" href="{{ route('listar_series') }}">Controle de Séries</a>
        @auth
            <a href="/sair" class="text-white-50">Sair</a>
        @endauth
            
        @guest
            <a href="/entrar" class="text-white-50">Entrar</a> 
        @endguest
        </nav>

        
    <div class="container mt-4">
        <div class="jumbotron">
            <h1 class="display-3">@yield('cabecalho')</h1>
        </div>
        @yield('conteudo')
    </div>
</body>
</html>