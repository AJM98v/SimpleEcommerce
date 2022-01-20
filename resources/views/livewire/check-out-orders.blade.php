<div class="checkout">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @php
        \Cart::session(1);
    @endphp


    <table>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Operation</th>

        </tr>
        @foreach (\Cart::getContent() as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td><button class="btn btn-danger" wire:click="Remove({{$item}})">Delete</button></td>

        </tr>

        @endforeach

        <tr>
            <th>Total</th>
            <td>{{\Cart::getTotal()}}</td>
        </tr>

    </table>

    <button wire:click="order" class="btn btn-success">Order</button>



</div>



