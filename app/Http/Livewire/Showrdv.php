<?php

namespace App\Http\Livewire;

use App\Models\Avance;
use App\Models\Rdv;
use App\Models\Service;
use Livewire\Component;

class Showrdv extends Component
{
    public $avc;
    protected $rules = [
        'avc' => 'required',
    ];

    protected $listeners = ['RdvAdded' => '$refresh'];
    protected $listeners2 = ['AvcAdded' => '$refresh'];

    public function render()
    {
        $rdv=Rdv::orderBy('created_at','DESC')->get();
        $avances=Avance::all();
        return view('livewire.showrdv',compact('rdv', $rdv,'avances', $avances));
    }

    public function AddAvc($num)
    {
        $this->validate();
        Avance::updateOrCreate([
            'num' => $num,
            'avc' => $this->avc,
        ]);
        $this->emit('AvcAdded');
        $this->avc="";
    }

    public function Remove($id)
    {
        Rdv::find($id)->delete();
    }

    public function RemoveAvc($id)
    {
        Avance::find($id)->delete();
    }

}
