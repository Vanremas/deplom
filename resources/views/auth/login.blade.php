<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/basket.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adaptivbasket.css') }}">
    <title>Teemo Shop</title>
</head>


<body class="bod">
<header class="h-er">

<div class="logo-div">
<a href="/"><img src="{{ asset('css/img/Logo.png') }}" class="logo" ></a>
<a class="otz" href="https://vk.com/topic-214771204_48800415">Отзывы</a>
<a class="faqg">FAQ</a>
</div>




</header>
<main class="str">
<!-- <div class="err">
Аккаунт не найден, или не верный пароль!
</div> -->

<div class="aut-f">
    <h1 class="aut-ent">Вход</h1>
    <form method="POST" action="{{ route('login') }}" >
        @csrf
<input type="text" name="email" placeholder="Email" class="aut-ord" required>
<input type="password" name="password" placeholder="Пароль" class="aut-ordz" minlength="8" required>
<button class="aut-fbut" type="submit">Войти</button>
</form>
<a href="{{ route('register') }}"><button class="aut-fbut-1">Зарегистрироваться</button></a>
</div>






</main>

</body>

<bottom class="bott">
<h1 class="zag">© В гостях у Тимо</h1>
<a class="us-yes">Пользовательское соглашение</a>
    </bottom>

</html>