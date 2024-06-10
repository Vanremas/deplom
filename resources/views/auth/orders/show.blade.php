<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/basket.css') }}">
    <title>Teemo Shop</title>
</head>


<body class="bod">
<header class="h-er">
<button onclick="history.back()" class="back">Назад</button>

<div class="logo-div">
<a href="/"><img src="{{ asset('css/img/Logo.png') }}" class="logo" ></a>
<a class="otz" href="https://vk.com/topic-214771204_48800415">Отзывы</a>
<a class="faq">FAQ</a>
</div>


<div class="aut">

<a href="{{ route('get-logout') }}" class="exit-img"><img src="{{ asset('css/img/exit.png') }}" ></a>
<a  href="{{ route('person.home') }}">
<div class="butt-prof-1">
<img src="{{ asset('css/img/user.png') }}" class="prof-img">
<p class="prof-name-1">{{$user->name}}</p>
<p class="prof-balance">0 RUB</p>

</div>
</a>


</div>



</header>

<main class="str">


    <p class="bask-h"> Заказ №{{$order->id}} </p>

<div class="user-orinf">

<div class="inf-stat">
    <h1 class="cli-sh">Клиент</h1>
    <h1 class="cli-sh">Riot Id</h1>
    <h1 class="cli-sh">Мессджер</h1>
</div>
    <div class="inf-func">
<p class="cli-z-sh">{{ $order->user->name }}</p>

<p class="cli-z-sh">{{$order->name}}</p>

<p class="cli-z-sh"> {{$order->vk}}</p>
</div>

</div>

<div class="bask-inf">

<p class="inf-name">Название</p>
<p class="inf-price">Цена</p>

</div>

<div class="items">
@foreach($order->products as $product)

<div class="item">
<img src="{{ Storage::url($product->image) }} " class="skin-img">
<p class="pi-name">{{$product->name}}</p>

<p class="p-price">{{$product->price}} руб.</p>
</div>

@endforeach
<div>
<p class="f-price">Общая стоимость: {{ $order->getFullPrice() }} руб.</p>
</div>



</main>

</body>

<footer class="bott">
<h1 class="zag">© В гостях у Тимо</h1>
<a class="us-yes">Пользовательское соглашение</a>
    </footer>

</html>