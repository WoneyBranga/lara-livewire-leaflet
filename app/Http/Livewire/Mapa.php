<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Mapa extends Component
{
    public
        $lat,
        $long,
        $test = 'batata',
        $pontoProximoNome,
        $pontoProximoLat,
        $pontoProximoLong,
        $distanciaRodovia,
        $distanciaReta;

    protected $listeners = [
        'getPontoProximo' => "getHora()"
    ];

    public function render()
    {
        return view('livewire.mapa');
    }

    function updatedLong()
    {
        $pontoProximoBanco = $this->getPontoProximo();

        if ($this->test != 'batata') return false;

        if (count($pontoProximoBanco)) {
            $this->pontoProximoNome = $pontoProximoBanco[0]->ID;
            $this->pontoProximoLat = $pontoProximoBanco[0]->LAT;
            $this->pontoProximoLong = $pontoProximoBanco[0]->LONG;
            $this->distanciaReta = $pontoProximoBanco[0]->distancia;

            $this->dispatchBrowserEvent(
                'teste',
                [
                    'response' => [
                        'latitude' => $pontoProximoBanco[0]->LAT,
                        'longitude' => $pontoProximoBanco[0]->LONG,
                        'estacao' => $pontoProximoBanco[0]->ID,
                        'distancia' => round(($pontoProximoBanco[0]->distancia / 1000), 3)
                    ],
                ]
            );
            $this->test = 'tomate';
        }
    }


    public function getHora()
    {
        $this->test = 'tomate';
        // $this->dispatchBrowserEvent(
        //     'teste',
        //     ['response' => ['a' => 111, 'b' => 123]]
        // );

        return now()->format('d/m/Y h:i:s');
    }

    public function getPontoProximo()
    {
        $query = 'SELECT
                    e."ID",
                    ST_Distance(
                        e.geom, ST_SetSRID(ST_MakePoint(:long,:lat),
                        4326)::geography) as distancia,
                    e."LAT",
                    e."LONG",
                    e.geom
                FROM public."ESTACOES_BR_201222" e
                WHERE
                ST_DWithin(
                    e.geom,
                    ST_SetSRID(
                        ST_MakePoint(:long,:lat),
                        4326)::geography,
                        20000000)
                ORDER BY 2 ASC
                LIMIT 1;';

        $bindings = [
            ':long' => $this->long,
            ':lat' => $this->lat
        ];

        return DB::select($query, $bindings);
    }
}
