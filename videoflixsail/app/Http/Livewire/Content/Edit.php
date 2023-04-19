<?php

namespace App\Http\Livewire\Content;

use Livewire\Component;
use App\Models\Content;

class Edit extends Component
{
    public $content;

    public $rules = [
        'content.title' => 'required',
        'content.body' => 'required|min:10'
    ];

    public function mount(Content $content)
    {
        $this->content = $content;

        // dd($this->content);
    }

    public function editContent()
    {
        dd($this->content);
    }

    public function render()
    {
        return view('livewire.content.edit');
    }
}
