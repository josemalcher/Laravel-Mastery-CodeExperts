<?php

namespace App\Http\Livewire\Content;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $contents = \App\Models\Content::paginate(5);

        return view('livewire.content.index', compact('contents'));
    }
}
