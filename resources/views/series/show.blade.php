@extends('layout')

@section('cabecalho')
    Temporadas
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item py-3 d-flex justify-content-between align-items-center">
                <a href="{{ route('temporadas.show', $temporada->id) }}">
                    Temporada {{ $temporada->numero }}
                </a>
                <span class="badge bg-secondary"> {{ $temporada->getEpisodiosAssistidos()->count() }} / {{ $temporada->episodios->count() }}</span>
            </li>
        @endforeach
    </ul>
@endsection

