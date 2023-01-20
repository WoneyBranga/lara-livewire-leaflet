<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Mapa extends Component
{
    public
        $lat,
        $long,
        $test = 'batata';

    public function render()
    {
        return view('livewire.mapa');
    }
}
