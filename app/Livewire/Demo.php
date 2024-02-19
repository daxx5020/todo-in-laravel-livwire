<?php

namespace App\Livewire;

use Livewire\Component;

class Demo extends Component
{
    public
     $count = 1;
    
    public function render()
    {
        return view('livewire.demo');
    }

    public function increment(){
        $this->count++;
    }

    public function decrement(){
        $this->count--;
    }
    
}
