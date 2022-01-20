<?php

namespace App\Http\Livewire;

use App\Models\Comments as ModelsComments;
use Livewire\Component;

class Comments extends Component
{
    public $comments =[];
    public $name;
    public $email;
    public $text;
    public $product;

    protected $rules =[
        'name'=>'Required',
        'email'=>'Required',
        'text'=>'Required',

    ];

    public function mount($product){
        $this->comments = $product->comments()->orderByDesc('id')->get();
        $this->product = $product;
    }

    public function saveComment(){
        $this->validate();

        \App\Models\Comments::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'text'=>$this->text,
            'product_id'=>$this->product->id
        ]);

        $this->comments = $this->product->comments()->get();



    }





    public function render()
    {

        return view('livewire.comments',compact($this->comments));
    }
}
