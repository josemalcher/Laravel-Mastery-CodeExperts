<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $title;
    public $body;

    protected $rules = [
        'title' => 'required',
        'body' => 'required|min:10'
    ];

    public function saveContent()
    {
        // dd($this->title, $this->content);

        // salvar os dados... COntent::create(...)
        // retornar mensagem de sucesso

        $this->validate();

        \App\Models\Content::create([
            'title' => $this->title,
            'body' => $this->body
        ]);

        $this->reset('title', 'body');// limpar os campos

        session()->flash('success', 'O conteudo foi salvo com sucesso');
    }

    public function render()
    {
        return view('livewire.test');
    }
}
