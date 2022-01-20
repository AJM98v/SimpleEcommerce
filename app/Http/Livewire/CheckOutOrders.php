<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Product;

class CheckOutOrders extends Component
{


    public function order(){





        \Cart::session(1);


        if (\Cart::isEmpty()){
            return redirect()->route('checkout')->with('message','Cart is Empty');
        }else{
            foreach (\Cart::getContent() as $order){
                Order::create([
                    'user_id'=>1,
                    'product_name'=>$order->name,
                    'product_price'=>$order->price,
                    'quantity'=>$order->quantity,
                    'product_id'=>$order->id
                ]);
                $product = Product::where('id',$order->id)->firstOrFail();
                $sell = $product->sell;

                $sell = $sell+$order->quantity;

                $product->update([
                   'sell'=>$sell
                ]);




            }





            \Cart::clear();

            return redirect()->route('index')->with('message','Order Will Be get to you soon');
        }





    }

    public function Remove($item){
        \Cart::session(1);
        \Cart::remove($item['id']);
        return redirect()->route('checkout')->with('message','Delete Successfully');
    }


    public function render()
    {
        return view('livewire.check-out-orders');
    }



}
