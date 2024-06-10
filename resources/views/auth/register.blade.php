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

<div class="logo-div">
<a href="/"><img src="{{ asset('css/img/Logo.png') }}" class="logo" ></a>
<a class="otz" href="https://vk.com/topic-214771204_48800415">Отзывы</a>
<a class="faqg">FAQ</a>
</div>




</header>
<main class="str">


<div class="aut-f">
    <h1 class="aut-h1">Регистрация</h1>

    <form  method="POST" action="{{ route('register') }}">
        @csrf
    <input type="email" name="email" placeholder="Email" class="aut-ord" required>
<input type="text" name="name" placeholder="Логин" class="aut-ord" required>
<input type="password" name="password" placeholder="Пароль" class="aut-ordz" minlength="8" required >
<input type="password" name="password_confirmation" placeholder="Повторите Пароль" class="aut-ordz" minlength="8" required >   
<button class="aut-fbut-reg" type="submit">Зарегистрироваться</button>
</form>

<a href="{{ route('login') }}"><button class="aut-fbut-1">Есть аккаунт?</button></a>

</div>






</main>

</body>

<bottom class="bott">
<h1 class="zag">© В гостях у Тимо</h1>
<a class="us-yes">Пользовательское соглашение</a>
    </bottom>

</html>