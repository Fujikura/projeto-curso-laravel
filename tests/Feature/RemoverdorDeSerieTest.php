<?php

namespace Tests\Feature;

use App\Serie;
use Tests\TestCase;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemoverdorDeSerieTest extends TestCase
{
    use RefreshDatabase;

    private Serie $serie;

    protected function setUp(): void
    {
        parent::setUp();

        $criadorDeSerie = new CriadorDeSerie();
        $this->serie = $criadorDeSerie->criarSerie('Serie de Teste', 1, 1);
    }


    public function testRemoverUmaSerie()
    {
        $this->assertDatabaseHas('series',['id' => $this->serie->id ]);

        $removedorDeSerie = new RemovedorDeSerie();
        $nomeSerie = $removedorDeSerie->removerSerie($this->serie->id);

        $this->assertIsString($nomeSerie);
        $this->assertEquals('Serie de Teste', $this->serie->nome);
        $this->assertDatabaseMissing('series', [
            'id' => $this->serie->id
        ]);
    }
    
}
