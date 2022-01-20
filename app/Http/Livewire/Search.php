<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $products = [];

    public function updated()
    {

        $this->products = Product::where('title','like',"%{$this->search}%")->limit('3')->get();
    
    }


    public function render()
    {

        return view('livewire.search',compact($this->products));
    }
}
