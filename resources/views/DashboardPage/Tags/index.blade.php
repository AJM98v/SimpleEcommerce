@extends('dashboard')
@section('title','Category')

@section('content')
    @if (session('message') !== null)
        <div class='message' x-data="{
        show:true,
    }" x-show="show">
            {{session('message')}}

            <span x-on:click="show=false">&times;</span>
        </div>

    @endif
    @if($errors->all() !== null)
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="w-100 create-container">
        @if(isset($data))
            <form action="{{route('tags.update',$data['tag'])}}" method="post">
                @method('put')
                @else
                    <form action="{{route('tags.store')}}" method="post">
                        @endif
                        @csrf
                        <label for="title">Title :</label>
                        <input id="title" name="title" value="@if(isset($data)){{$data['tag']->title}}@endif" type="text">
                        <button type="submit" class="btn btn-success text-dark">@if(isset($data)) Update @else Create @endif</button>
                    </form>
                    <hr>
                    <table class="w-50">
                        <tr>
                            <th>Title</th>
                            <th>Operations</th>
                        </tr>

                        @foreach(\App\Models\Tag::all() as $tag)
                            <tr>
                                <td>{{$tag->title}}</td>
                                <td>
                                    <a href="{{route('tags.edit',$tag)}}">
                                        <button class="btn btn-info">Edit</button>
                                    </a>
                                    <form action="{{route('tags.destroy',$tag)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger text-dark">Delete</button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </table>
    </div>

@endsection
