<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/basket.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adaptivbasket.css') }}">
    <title>Профиль</title>
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

<div class="profile">
        <div class="avatar">
            <img src="{{ asset('css/img/user.png') }}" alt="Иконка">

            <div class="user-info">
            <h2 class="us-na">{{ $user->name }}</h2>
            <p style="float: left;">Id пользователя: {{ $user->id }}</p>
        </div>

        </div>
        
        <div class="actions">
            <a class="bal-up" href="">Пополнить</a>
            @auth
                @if($user->isAdmin())
                    <a class="us-sec" href="{{ route('orders') }}">Заказы</a>
                @else
                    <a class="us-sec" href="{{ route('person.orders.orders') }}">Мои заказы</a>
                @endif
            @endauth

            @auth
                @if($user->isAdmin())
                    <a class="us-sec" href="{{ route('products.index') }}">Товары</a>
                    <a class="us-sec" href="{{ route('categories.index') }}">Категории</a>
                @else
                    <a class="us-sec" href="{{ route('basket') }}">Корзина</a>
                @endif
            @endauth
        </div>
    </div>

</main>

</body>

<bottom class="bott">
<h1 class="zag">© В гостях у Тимо</h1>
<a class="us-yes">Пользовательское соглашение</a>
    </bottom>

</html>