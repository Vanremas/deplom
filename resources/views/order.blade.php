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
<h1 class="h-ord">Подтверждение Заказа</h1>
<form action="{{ route('basket-confirm') }}" method="POST">
<div class="acc-ord">
<input type="text" name="name" placeholder="Riot id: XXX#TAG" class="ri-ord" required>
<input type="text" name="vk" placeholder="Discord или VK" class="con-ord" required>
<p class="f-price-ord">Общая стоимость: {{ $order->getFullPrice() }} руб.</p>
@csrf
<button type="submit" class="btn-bask-v" role="button">Подтвердить Заказ</button>
</div>
</form>





</main>

</body>

<footer class="bott">
<h1 class="zag">© В гостях у Тимо</h1>
<a class="us-yes">Пользовательское соглашение</a>
    </footer>

</html>