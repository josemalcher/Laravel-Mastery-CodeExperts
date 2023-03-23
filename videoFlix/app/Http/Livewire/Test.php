<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $title;
    public function render()
    {
        return view('livewire.test');
    }
}
