<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/adaptivapp.css">
    <title>Teemo Shop</title>
</head>


<body class="bod">
<header class="h-er">

<div class="logo-div">
<a href="/"><img src="{{ asset('css/img/Logo.png') }}" class="logo" ></a>
<a class="otz" href="https://vk.com/topic-214771204_48800415">Отзывы</a>
<a class="faq">FAQ</a>
</div>


<div class="aut">
    @guest
<a href="{{ route('login') }}"><button class="butt-aut-1">Вход</button></a>
<a href="{{ route('register') }}"><button class="butt-aut-2">Регистрация</button></a>
    @endguest

    @auth
<a href="{{ route('get-logout') }}" class="exit-img"><img src="{{ asset('css/img/exit.png') }}" ></a>
<a  href="{{ route('person.home') }}">
<div class="butt-prof-1">
<img src="{{ asset('css/img/user.png') }}" class="prof-img">
<p class="prof-name-1">{{$user->name}}</p>
<p class="prof-balance">0 RUB</p>

</div>
</a>
    @endauth


</div>

</header>
<main class="str">
    
  
    @if(session()->has('success'))
<p class="alert">{{ session()->get('success') }}</p>
    @endif
<div class="categories">

    @foreach($categories as $category)
<a class="cat-r" href="/{{$category->code}}">{{$category->name}} </a>

    @endforeach
</div>

<form action="{{ route('search') }}" method="GET" class="form-inline my-2 my-lg-0">
<input type="search" name="query" placeholder="Поиск..." class="search"/>
</form>

<div class="items">

@foreach($products as $product)
<div class="item">
<img src="{{ Storage::url($product->image) }}" class="skin-img">

<div class="stats">


<input type="text" name="Skin" value="{{$product->name}}" class="item-skin" readonly>
<input type="text" name="Hero" value="{{$product->getCategory()->name}}" class="item-skin" readonly>
<input type="text" name="Sell" value="{{$product->price}} р." class="item-skin" readonly>
@guest
<a href="{{ route('login') }}"><button type="submit" class="btn" role="button">В Корзину</button></a>
@endguest
@auth
@if($user->isAdmin())
<form action="{{ route('basket-add', ['product' => $product->id]) }}" method="POST">
    @csrf 
    <button type="submit" class="btn" role="button" style="display: none;">В Корзину</button>
</form>
@else
<form action="{{ route('basket-add', ['product' => $product->id]) }}" method="POST">
    @csrf 
    <button type="submit" class="btn" role="button">В Корзину</button>
</form>
@endif
@endauth
</div>
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