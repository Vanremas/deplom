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
    <p class="bask-h"> Корзина </p>

<div class="bask-inf">

<p class="inf-name">Название</p>
<p class="inf-price">Цена</p>

</div>

<div class="items">

    <!-- Если в корзине есть товары -->
@if($order && $order->products->isNotEmpty())
@foreach($order->products as $product)

<div class="item">
<img src="{{ Storage::url($product->image) }} " class="skin-img">
<p class="pi-name">{{$product->name}}</p>

<form action ="{{ route('basket-remove', $product) }}" method="POST">
<button type="submit" class="sbm-del" href="">Удалить</button> 
@csrf
</form>

<p class="p-price">{{$product->price}} руб.</p>
</div>

@endforeach
<div>
<p class="f-price">Общая стоимость: {{ $order->getFullPrice() }} руб.</p>
<a href="{{ route('basket-place') }}"><button type="submit" class="btn-bask-z" role="button">Оформить Заказ</button>   </a>
</div>
<!-- --- -->

<!-- Пустая Корзина -->
@else
<div class="none-bask">
   <h1 class="nope">Корзина пуста.</h1>
   <a href="/"><button type="submit" class="btn-bask" role="button">Добавить Товары</button></a>
</div>
@endif
<!-- --- -->
</div>



</main>

</body>

<footer class="bott">
<h1 class="zag">© В гостях у Тимо</h1>
<a class="us-yes">Пользовательское соглашение</a>
    </footer>

</html>