<?php

namespace App\Http\Livewire;

use App\Models\Rdv;
use Livewire\Component;

class Addrdv extends Component
{
    public $nom, $numero, $service, $prix;

    protected $rules = [
        'nom' => 'required',
        'numero' => 'required',
        'service' => 'required',
        'prix' => 'required',
    ];

    public function render()
    {
        return view('livewire.addrdv');
    }

    public function AddRdv()
    {
        $this->validate();
        Rdv::updateOrCreate([
            'nom' => $this->nom,
            'numero' => $this->numero,
            'service' => $this->service,
            'prix' => $this->prix,
        ]);
        $this->emit('RdvAdded');
        $this->nom = "";
        $this->numero = "";
        $this->service = "";
        $this->prix = "";
    }
    
}
