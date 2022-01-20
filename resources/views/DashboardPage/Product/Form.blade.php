@extends('dashboard')

@section('title','Product Create')

@section('content')
    @if($errors->all() !== null)
        <div class="error">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <div class="form-container">
        @if(isset($data))
            <form action="{{route('product.update',$data['product'])}}" method="post" enctype="multipart/form-data">
                @method('put')

                @else
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @endif

                        @csrf
                        <label for="title">Title :</label>
                        <input id="title" name="title" type="text"
                               value="@if(isset($data)){{$data['product']->title}}@endif">
                        <label for="price">Price :</label>
                        <input type="text" name="price" id="price"
                               value="@if(isset($data)){{$data['product']->price}}@endif">
                        <label for="image">Image :</label>
                        <input type="file" name="image" id="image">
                        <label for="info">Info :</label>
                        <textarea id="info" name="info">@if(isset($data)){{$data['product']->info}}@endif</textarea>
                        <label for="description">Description :</label>
                        <textarea id="description"
                                  name="description">@if(isset($data)){{$data['product']->description}}@endif</textarea>
                        <label for="images">Images :</label>
                        <input type="file" name="images[]" id="image" multiple>
                        <label for="categories">Categories :</label>
                        <select id="categories" name="categories[]" multiple>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach

                        </select>
                        <label for="tags">Tags :</label>
                        <select id="tags" name="tags[]" multiple>
                            @foreach(\App\Models\Tag::all() as $tag)
                                <option value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach

                        </select>

                        <button type="submit" class="btn btn-success text-dark">@if(isset($data)) Update @else Create @endif</button>

                    </form>

    </div>
@endsection
