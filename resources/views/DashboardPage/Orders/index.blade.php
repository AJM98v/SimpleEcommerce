@extends('dashboard')
@section('title','Order')

@section('content')

    <div class="list-container">
        <table class="w-100">
            <tr class="bg-dark text-white">
                <th>{{__('Title')}}</th>
                <th>{{__('Price')}}</th>
                <th>{{__('Quantity')}}</th>

            </tr>
            @foreach($data['order'] as $order)
                <tr>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->product_price}}</td>
                    <td >{{$order->quantity}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

