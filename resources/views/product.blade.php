@include('layouts.header')

<section class="product-main">
    <div class="product-head">
        <div class="product-info">
            <label for="title">Product Name :</label>
            <h1 id="title">{{$product->title}}</h1>
            <label for="price">Price :</label><h3 id="price">{{$product->price}} $</h3>

            <label for="tag">Tags :</label>
            <div id="tag">
            @foreach($product->tag()->get() as $tag)
                <span>{{$tag->title}}</span>
            @endforeach
            </div>
            <label for="category">Category :</label>
            <div id="category">
            @foreach($product->category()->get() as $category)
                <span>{{$category->title}}</span>
            @endforeach
            </div>



        </div>
        @livewire('product-cart',['product'=>$product])


        <div class="slider">
            @foreach($product->Slides()->get() as $slide)
                <div class="slide">
                    <img src="{{Storage::url($slide->name)}}">

                </div>
            @endforeach

            <a class="prev" onclick="plusSlide(-1)">&#10094;</a>
            <a class="next" onclick="plusSlide(1)">&#10095;</a>
        </div>
    </div>

    <div class="product-tabs">
        <div class="tab">
            <button class="tablink" onclick="openTab(event,'description')" id="defaultTap">Description</button>
            <button class="tablink" onclick="openTab(event,'Comment')">Comments</button>
        </div>
        <div id="description" class="tabContent">
            {{$product->description}}
        </div>
        <div class="tabContent" id="Comment">
            @livewire('comments',['product'=>$product])
        </div>
    </div>








</section>





@include('layouts.footer')
