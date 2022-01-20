<div class="comment">
    {{-- Success is as dangerous as failure. --}}

    <ul>

        @foreach ($comments as $comment)
            <li>
                <h1>{{$comment->name}}</h1>
                <p>{{$comment->text}}</p>
            </li>
            <hr>
        @endforeach

    </ul>

    @foreach($errors->all() as $error)
        <h3>{{$error}}</h3>
    @endforeach

    <form wire:submit.prevent='saveComment' method="post">
        @csrf
        <label for="name">Name :</label>
        <input type="text" wire:model="name" id="name">
        <label for="email">Email :</label>
        <input type="email" wire:model="email" id="email">
        <label for="text">Your Comment :</label>
        <textarea wire:model="text" id="text"></textarea>
        <button type="submit" class="btn btn-success">Save</button>

    </form>

</div>
