<?php

namespace App\Http\Livewire\Mapa;

// use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class MapaModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.mapa.mapa-modal');
    }
}
