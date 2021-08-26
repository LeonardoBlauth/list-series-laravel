@extends('layout')

@section('cabecalho')
    Episódios da {{ $temporada->numero }}ª temporada
@endsection

@section('conteudo')
    @if (!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif
    <form method="post" action="{{ route('temporadas.update', $temporada->id) }}">
        @csrf
        @method("PUT")
        <ul class="list-group">
            @foreach ($episodios as $episodio)
                <li class="list-group-item py-3 d-flex justify-content-between align-items-center">
                    Episódio {{ $episodio->numero }}
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            name="episodios[]"
                            value="{{ $episodio->id }}"
                            {{ $episodio->assistido ? 'checked' : '' }}
                        >
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="row">
            <button class="btn btn-primary mt-4">Salvar</button>
        </div>
    </form>
@endsection

