<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use App\Models\Temporada;
use App\Services\CriadorSerie;
use App\Services\RemovedorSerie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('autenticador');
    }

    public function index(Request $request)
    {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request
            ->session()
            ->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorSerie $criadorSerie)
    {
        $serie = $criadorSerie
            ->criarSerie(
                $request->nome,
                $request->qtd_temporadas,
                $request->ep_por_temporada
            );

        $request
            ->session()
            ->flash(
                'mensagem',
                "{$serie->nome} registrada com sucesso"
            );

        return redirect('/series');
    }

    public function show(int $serieId)
    {
        $serie = Serie::find($serieId);

        $temporadas = Temporada::query()
            ->where('serie_id', $serieId)
            ->get();

        return view(
            'series.show',
            compact('serie', 'temporadas')
        );
    }

    public function edit($id)
    {
        //
    }

    public function update(int $serieId, Request $request)
    {
        $serie = Serie::findOrFail($serieId);
        $serie->update($request->all());

        $request
            ->session()
            ->flash(
                'mensagem',
                "$serie->nome editada com sucesso"
            );

        return redirect('/series');
    }

    public function destroy(int $serieId, RemovedorSerie $removedorSerie, Request $request)
    {
        $nomeSerie = $removedorSerie->removerSerie($serieId);

        $request
            ->session()
            ->flash(
                'mensagem',
                "$nomeSerie removida com sucesso"
            );

        return redirect('/series');
    }
}
