<?php

namespace App\Http\Livewire\Content;

use Livewire\Component;

use \App\Models\Content as ContentModel;

class Content extends Component
{
    public ContentModel $content;

    public function mount($content)
    {
        $this->content = $content;
    }

    public function render()
    {
        return view('livewire.content.content');
    }
}
