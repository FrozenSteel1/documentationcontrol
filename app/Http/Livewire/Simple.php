<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Simple extends Component
{
    public function render()
    {
        return view('livewire.simple');
    }
    public function alarm(){
        echo 'alarm';
        dd('alarm');
    }
}
