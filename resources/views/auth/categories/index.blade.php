

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


    <p class="bask-h"> Категории </p>

<div class="cate-inf">
<p class="cate-id">#</p>
<p class="cate-name">Название</p>
<p class="cate-code">Код</p>
<p class="cate-dey">Действия</p>

</div>

<div class="itemscat">

@foreach($categories as $category)

<div class="itemcat">
<p class="c-id">{{$category->id}}</p>
<p class="c-name">{{$category->name}}</p>
<p class="c-code">{{$category->code}}</p>
<form action ="{{ route('categories.destroy', $category) }}" method="POST">
    
<a type="button" class="cbm-red" href="{{ route('categories.edit', $category->id) }}">Редактировать</a> 
@csrf
@method('DELETE')
<input type="submit" class="cbm-del" value="Удалить"></input> 
</form>
</div>

@endforeach







</div>
<a class="add-cat" type="button" href="{{ route('categories.create') }}">Добавить Категорию</a>


</main>

</body>

<footer class="bott">
<h1 class="zag">© В гостях у Тимо</h1>
<a class="us-yes">Пользовательское соглашение</a>
    </footer>

</html>