<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $title;
    public $content;

    public function saveContent()
    {
        // dd($this->title, $this->content);

        // salvar os dados... COntent::create(...)
        // retornar mensagem de sucesso

        session()->flash('success', 'O conteudo foi salvo com sucesso');

    }

    public function render()
    {
        return view('livewire.test');
    }
}
