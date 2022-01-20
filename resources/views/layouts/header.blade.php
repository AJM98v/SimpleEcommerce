<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce</title>
    <link rel='stylesheet' href="/css/app.css" type="text/css">
    <link rel='stylesheet' href="/css/bootstrap.min.css" type="text/css">
    <link rel='stylesheet' href="/css/fontawesome.min.css" type="text/css">
    <link rel='stylesheet' href="/css/normalize.css" type="text/css">
    <link rel='stylesheet' href="/css/main.css" type="text/css">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @livewireStyles()
</head>
<body>
<section class="head">
    <div class="logo">
        <img src="/img/shopping.png" id="logo" alt="logo">
        <h3>E-Commerce</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>

    </div>
    @livewire('search')

    @livewire('shopping-cart')

</section>


@if (session('message') !== null)
    <div class='message' x-data="{
        show:true,
    }" x-show="show">
        {{session('message')}}

        <span x-on:click="show=false">&times;</span>
    </div>

@endif


