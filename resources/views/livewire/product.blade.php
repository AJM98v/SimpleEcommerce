<div class='main'>


    <div class="product">
        <div class=sort>
            <button wire:click="setOrder('views')">Most Views</button>
            <button wire:click="setOrder('sell')">Most Sell</button>
            <button wire:click="setOrder('likes')">Most Popular</button>
        </div>
        <div class="items">
            @foreach ($products as $product)
            <div class='item'>
                <img src="{{Storage::url($product->image)}}" alt="Image">
                    <h1>{{$product->title}}</h1>
                    <h3>{{$product->price}}</h3>
                    <p>{{$product->info}}</p>
                    <a href="{{route('product',$product)}}">
                        <button class='btn btn-info' wire:click="view({{$product}})">See more</button>
                    </a>
                <button class='btn btn-danger' wire:click='Like({{$product}})'>LIke</button>
                <button class='btn btn-success' wire:click="Add({{$product}})">Add to Cart</button>
            </div>
            @endforeach
        </div>

    </div>
    <div class="category">
        <ul>
            @foreach (\App\Models\Category::all() as $category)
                    <li wire:click="getCategory({{$category}})">{{$category->title}}</li>
                @endforeach
        </ul>



    </div>





</div>
