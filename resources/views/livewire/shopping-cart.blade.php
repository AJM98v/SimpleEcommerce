<div class="cart">
    @php
        $items = \Cart::session(1)->getContent();
        $count = $items->count();


    @endphp

<div class="cart" x-data="{
            cart:false
        }">
    <img src="/img/shopping-cart.png" id='cart' alt="cart" x-on:click="cart=!cart">
    <span>{{$count}}</span>
    <div class="cart-content" x-show="cart">
        <table>
            @foreach($items as $item)
            <tr>

                    <td>
                        <h4>{{$item->name}}</h4>
                    </td>
                    <td>
                        <h5>{{$item->quantity}}</h5>
                    </td>
                    <td>
                        <h4>{{$item->price}}</h4>

                    </td>
                    <td>
                        <span wire:click='remove({{$item}})'>&times;</span>
                    </td>

            </tr>

            @endforeach

        </table>

        <h3>{{\Cart::getTotal()}}$</h3>

        <a href={{route('checkout')}}>
            <button>Checkout</button>
        </a>

    </div>


</div>
</div>
