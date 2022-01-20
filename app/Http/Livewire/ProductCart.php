<?php

namespace App\Http\Livewire;

use App\Models\Product as ModelsProduct;
use Livewire\Component;
use Cart;

class ProductCart extends Component
{
    public $product;
    public function mount($product){
        $this->product = $product;
    }
    public function Add(){
        Cart::session(1);
        Cart::add([
            'id'=>$this->product['id'],
            'price'=>$this->product['price'],
            'name'=>$this->product['title'],
            'quantity'=>'1'

        ]);

        return redirect()->route('product',$this->product)->with('message','Product Add to Cart Successfully');




    }

    public function Like(){
        $item =  ModelsProduct::where('id',$this->product['id'])->firstOrFail();

        $like = $item->likes;
        $like++;

        $item->update([
            'likes'=>$like,
        ]);




    }

    public function render()
    {
        return view('livewire.product-cart');
    }
}
