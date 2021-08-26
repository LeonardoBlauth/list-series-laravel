<?php

namespace Tests\Unit;

use App\Models\Serie;
use App\Services\CriadorSerie;
use App\Services\RemovedorSerie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RemovedorSerieTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Serie
     */
    private $serie;

    protected function setUp(): void
    {
//        $criadorSerie = new CriadorSerie();
//        $this->serie = $criadorSerie
//            ->criarSerie(
//                'Nome da Série',
//                1,
//                1
//            );
    }

    /**
     * A basic unit test example.
     */
    public function testeRemoverSerie(): void
    {
//        $this->assertDatabaseHas(
//            'series',
//            [
//                'id' => $this->serie->id
//            ]
//        );
//
//        $removedorSerie = new removedorSerie();
//        $nomeSerie = $removedorSerie->removerSerie($this->serie->id);
//
//        $this->assertIsString($nomeSerie);
//        $this->assertEquals('Nome da Série', $this->serie->nome);
//        $this->assertDatabaseMissing(
//            'series',
//            [
//                'id' => $this->serie->id
//            ]
//        );
    }
}
