<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function __construct()
    {
        $this->middleware('autenticador');
    }

    public function show(int $temporadaId, Request $request)
    {
        $temporada = Temporada::findOrFail($temporadaId);

        $episodios = Episodio::query()
            ->where('temporada_id', $temporadaId)
            ->get();

        $mensagem = $request->session()->get('mensagem');

        return view(
            'temporadas.show',
            [
                'temporada' => $temporada,
                'episodios' => $episodios,
                'mensagem' => $mensagem
            ]
        );
    }

    public function update(int $temporadaId, Request $request)
    {
        $temporada = Temporada::findOrFail($temporadaId);
        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function (Episodio $episodio) use ($episodiosAssistidos) {
            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
        });
        $temporada->push();

        $request->session()->flash('mensagem', 'Status dos episódios atualizados com sucesso');

        return redirect()->back();
    }
}
