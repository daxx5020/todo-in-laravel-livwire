<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\todo;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class TodoList extends Component
{
    
    use WithPagination;
    
    #[Rule('required|min:3|max:50')]
    
    public $name;
    public $search;

    public function create(){

        $validated = $this->validateOnly("name");

        todo::create($validated);

        $this->reset('name');

        session()->flash('success', "Task Created");

        // testing commit for new branch

    }
    
    public function render()
    {
        // $todos = todo::all();
        return view('livewire.todo-list',[
            'todos' => todo::latest()->where('name','like',"%{$this->search}%")->paginate(5)
        ]);
    }

    public function delete($todoid){
        todo::find($todoid)->delete();
    }
}
