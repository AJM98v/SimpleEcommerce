@extends('dashboard')

@section('title','Product List')

@section('content')
    @if(session('message')!==null)
        <div class="message" x-data="{
        show:true
        }">
            {{session('message')}}
            <span x-on:click="show=false">&times;</span>
        </div>
    @endif
    <div class="list-container">
        <table class="w-100">
            <tr class="bg-dark text-white">
                <th>{{__('Title')}}</th>
                <th>{{__('Price')}}</th>
                <th>{{__('Operations')}}</th>

            </tr>
            @foreach($data['product'] as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td >
                        <a href="{{route('product',$product)}}">
                            <button class="btn btn-dark">نمایش</button>

                        </a>
                        <a href="{{route('product.edit',$product)}}">
                            <button class="btn btn-info">ویرایش</button>
                        </a>
                        <form action="{{route('product.destroy',$product)}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger text-dark">حذف</button>

                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
