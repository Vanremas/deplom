

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


    <p class="bask-h"> Товары </p>

<div class="prod-inf">
<p class="prod-id">#</p>
<p class="prod-name">Название</p>
<p class="prod-code">Категория</p>
<p class="prod-code">Код</p>
<p class="prod-code">Цена</p>
<p class="prod-dey">Действия</p>

</div>

<div class="itemprods">

@foreach($products as $product)

<div class="itemprod">
<p class="pr-id">{{$product->id}}</p>
<p class="pr-name">{{$product->name}}</p>
<p class="pr-name">{{$product->getCategory()->name}}</p>
<p class="pr-code">{{$product->code}}</p>
<p class="pr-price">{{$product->price}}</p>
<form action ="{{ route('products.destroy', $product) }}" method="POST">
    
<a type="button" class="pr-red" href="{{ route('products.edit', $product->id) }}">Редактировать</a> 
@csrf
@method('DELETE')
<input type="submit" class="pr-del" value="Удалить"></input> 
</form>
</div>

@endforeach







</div>
<a class="add-cat" type="button" href="{{ route('products.create') }}">Добавить Товар</a>


</main>

</body>

<footer class="bott">
<h1 class="zag">© В гостях у Тимо</h1>
<a class="us-yes">Пользовательское соглашение</a>
    </footer>

</html>