<?php

namespace App\Services;

use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorSerie
{
    public function removerSerie(int $serieId): string
    {
        DB::beginTransaction();

        $serie = Serie::findOrFail($serieId);
        $nomeSerie = $serie->nome;
        $this->removerTemporadas($serie);
        $serie->delete();

        DB::commit();

        return $nomeSerie;
    }

    private function removerTemporadas(Serie $serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });
    }

    private function removerEpisodios(Temporada $temporada): void
    {
        $temporada->episodios->each(function (Episodio $episodio) {
            $episodio->delete();
        });


    }
}
