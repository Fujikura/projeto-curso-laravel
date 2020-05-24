<?php 
namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $epPorTemporadas)
    {
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->criarTemporadas($serie, $qtdTemporadas, $epPorTemporadas); 
        DB::commit();   

        return $serie;

    }

    private function criarTemporadas(Serie $serie, int $qtdTemporadas, int $epPorTemporadas) : void
    {
        for($i=1; $i <= $qtdTemporadas; $i++){    
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this-> criarEpisodios($temporada, $epPorTemporadas);
        }
    }

    private function criarEpisodios(\Illuminate\Database\Eloquent\Model $temporada, int $epPorTemporadas) : void
    {
        for($j=1; $j <= $epPorTemporadas; $j++){
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
?>