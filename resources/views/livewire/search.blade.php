<div class="search" x-data="{
            content : false,

        }">
    <input type="search" id='search' x-on:focus="content = true" x-on:click.outside="content = false"
           wire:model='search'>

    <div x-show="content" class="content">
        <ul>
            @foreach ($products as $product)
                <li>
                    <a href="{{route('product',$product)}}">
                        <img src="{{Storage::url($product->image)}}" alt="p1">
                        <h4>{{$product->title}}</h4>
                        <p>{{$product->info}}</p>
                    </a>
                </li>
                <hr>

            @endforeach

        </ul>

    </div>


</div>
