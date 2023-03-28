<?php

namespace App\Http\Livewire\Content;

use App\Models\Content;
use Livewire\Component;

class Delete extends Component
{
    public $content;

    public function mount(Content $content)
    {
        $this->content = $content;
    }

    public function render()
    {
        return view('livewire.content.delete');
    }

    public function deleteContent()
    {
        if(!$this->content->delete()){
            session()->flash('error', 'Erro ao remover');
        }

        session()->flash('success', 'Conteudo Removido com sucesso');
        return redirect()->route('content.index');
    }
}
