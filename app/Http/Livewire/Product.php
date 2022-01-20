<?php

namespace App\Http\Livewire;

use App\Models\Product as ModelsProduct;
use App\Models\Category;
use Cart;

use Livewire\Component;

class Product extends Component
{
    public $sortField = 'views';
    public $sortDir = 'desc';
    public $products = array();


    public function mount()
    {
        $this->products = ModelsProduct::all();

    }


    public function getCategory(Category $category)
    {

        $this->products  = $category->Product()->get();


    }
    public function Add($product){
        Cart::session(1);
        Cart::add([
            'id'=>$product['id'],
            'price'=>$product['price'],
            'name'=>$product['title'],
            'quantity'=>'1'

        ]);

        return redirect()->route('index')->with('message','Product Add to Cart Successfully');




    }

    public function Like($product){
       $item =  ModelsProduct::where('id',$product['id'])->firstOrFail();

       $like = $item->likes;
       $like++;

       $item->update([
           'likes'=>$like,
       ]);




    }

    public function setOrder($sortField){
        $this->products = ModelsProduct::orderBy($sortField, $this->sortDir)->get();

    }

    public function view($product){
        $item = ModelsProduct::where('id',$product['id'])->firstOrFail();
        $view = $item->views;
        $view++;
        $item->update([
            'views'=>$view,

        ]);


    }





    public function render()
    {

        return view('livewire.product',compact($this->products));
    }

}
