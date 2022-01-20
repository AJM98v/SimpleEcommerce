<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;


class ShoppingCart extends Component
{


    public function render()
    {
        return view('livewire.shopping-cart');
    }

    public function remove($item){
        Cart::session(1);
        Cart::remove($item['id']);



    }

}
