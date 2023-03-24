<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required',
        'content' => 'required|min:10'
    ];

    public function saveContent()
    {
        // dd($this->title, $this->content);

        // salvar os dados... COntent::create(...)
        // retornar mensagem de sucesso

        $this->validate();

        $this->reset('title', 'content');// limpar os campos

        session()->flash('success', 'O conteudo foi salvo com sucesso');
    }

    public function render()
    {
        return view('livewire.test');
    }
}
