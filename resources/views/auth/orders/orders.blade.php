<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
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

    <p class="htitle-ma"> Заказы </p>


    <div class="items">



@foreach($orders as $order)
<div class="item">
<h1 class="htitle">Заказ #{{$order->id}}</h1>
<p class="title">Клиент</p>
<input type="text" name="Skin" value="{{ optional($order->user)->name }}" class="item-skin" readonly>
<p class="title">Riot Id</p>
<input type="text" name="Hero" value="{{$order->name}}" class="item-skin" readonly>
<p class="title">Оформлен</p>
<input type="text" name="Sell" value="{{$order->created_at->format('h:i d/m/Y')}}" class="item-skin" readonly>
<input type="text" name="Sell" value="Сумма: {{$order->getFullPrice() }} руб." class="item-skin" readonly>
<a class="btn-open"
@if(Auth::user()->isAdmin())
href="{{ route('orders.show', $order ) }}"
@else
href="{{ route('person.orders.show', $order ) }}"
@endif

>Открыть</a>
</div>
@endforeach



    </div>


</main>

</body>

<footer class="bott">
<h1 class="zag">© В гостях у Тимо</h1>
<a class="us-yes">Пользовательское соглашение</a>
    </footer>

</html>