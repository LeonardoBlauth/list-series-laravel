@extends('layout')

@section('cabecalho')
Lista de Séries
@endsection

@section('conteudo')

@if (!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }}
    </div>
@endif

<div class="mb-2">
    <a href="/series/create" class="btn btn-dark">Adicionar</a>
</div>
<ul class="list-group">
    @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
            <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>
            <form method="post" action="{{ route('series.update', $serie->id)}}">
                @method("PUT")
                <div class="input-group w-auto me-5" hidden id="input-nome-serie-{{ $serie->id }}">
                    <input type="text" name="nome" id="nome" class="form-control" value="{{ $serie->nome }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check"></i>
                        </button>
                        @csrf
                    </div>
                </div>
            </form>
            @csrf
            <div class="d-flex">
                <button class="btn btn-info btn-sm me-2" onclick="toggleInput({{ $serie->id }})">
                    <i class="far fa-edit"></i>
                </button>
                <a href="{{ route('series.show', $serie->id) }}" class="btn btn-info btn-sm me-2">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <form
                    method="post"
                    action="{{ route('series.destroy', $serie->id) }}"
                    onsubmit="return confirm('Tem certeza que deseja excluir {{ addslashes($serie->nome) }}?')"
                >
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </li>
    @endforeach
</ul>

<script>
    function toggleInput(serieId) {
        const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`)
        const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`)

        if (nomeSerieEl.hasAttribute('hidden')) {
            nomeSerieEl.removeAttribute('hidden');
            inputSerieEl.hidden = true;
        } else {
            inputSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;
        }
    }
</script>
@endsection
