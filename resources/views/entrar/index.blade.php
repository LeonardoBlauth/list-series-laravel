@extends('layout')

@section('cabecalho')
    Entrar
@endsection

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
        </div>

        <div class="row d-flex justify-content-center">
            <button type="submit" class="col-5 btn btn-primary mt-3 me-2">
                Entrar
            </button>

            <a href="{{ route('registrar.create') }}" class=" col-5 btn btn-secondary mt-3 ms-2">
                Registrar
            </a>
        </div>
    </form>
@endsection
