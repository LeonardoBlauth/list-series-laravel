<?php

namespace App\Services;

use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;

class CriadorSerie
{
    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $epPorTemporada)
    {
        DB::beginTransaction();

        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->criarTemporadas($qtdTemporadas, $serie, $epPorTemporada);

        DB::commit();

        return $serie;
    }

    public function criarTemporadas(int $qtdTemporadas, Serie $serie, int $epPorTemporada): void
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            $this->criarEpisodios($epPorTemporada, $temporada);
        }
    }

    public function criarEpisodios(int $epPorTemporada, Temporada $temporada): void
    {
        for ($j = 1; $j <= $epPorTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
