<?php

namespace Tests\Unit;

use App\Models\Serie;
use App\Services\CriadorSerie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CriadorSerieTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function testeCriarSerie()
    {
//        $criadorSerie = new CriadorSerie();
//        $nomeSerie = 'Nome de teste';
//        $serieCriada = $criadorSerie
//            ->criarSerie(
//                $nomeSerie,
//                1,
//                1
//            );
//
//        $this->assertInstanceOf(Serie::class, $serieCriada);
//        $this->assertDatabaseHas('series', ['nome' => $nomeSerie]);
//        $this->assertDatabaseHas('temporadas', ['serie_id' => $serieCriada->id, 'numero'=> 1]);
//        $this->assertDatabaseHas('episodios', ['numero'=> 1]);
    }
}
