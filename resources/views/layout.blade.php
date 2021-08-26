<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Séries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
    <a
        class="navbar navbar-brand navbar-expand-lg ms-3 text-uppercase"
        href="{{ route('series.index') }}"
    >
        Home
    </a>
    @auth
        <a class="nav-link text-danger" href="{{ route('sair.index') }}">Sair</a>
    @endauth
</nav>
<div class="container">
    <div class="col card my-5">
        <div class="card-body text-center text-uppercase fw-bold bg-light">
            <h1>@yield('cabecalho')</h1>
        </div>
    </div>
    <div class="col mb-3">
        @yield('conteudo')
    </div>
</div>
</body>
</html>
