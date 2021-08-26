@extends('layout')

@section('cabecalho')
Adicionar Nova Série
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
<form method="post" action="{{ route('series.store')}}">
    @csrf
    <div class="row mb-3 d-sm-flex align-items-center justify-content-center">
        <div class="col-auto col-lg-8 col-md-6 mb-sm-2">
            <label for="nome" class="form-label text-uppercase fw-bold">Série:</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome da série">
        </div>
        <div class="col-auto col-lg-2 col-md-3 mb-sm-2">
            <label for="qtd_temporadas" class="form-label text-uppercase fw-bold">Nº de Temps:</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
        </div>
        <div class="col-auto col-lg-2 col-md-3">
            <label for="ep_por_temporada" class="form-label text-uppercase fw-bold">Ep por Temps:</label>
            <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
@endsection
