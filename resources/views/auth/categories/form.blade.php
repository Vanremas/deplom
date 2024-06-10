

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/basket.css') }}">
    @isset($category)
<title>Редактировать категорию {{$category->name}}</title>
@else
<title>Создать категорию</title>
@endisset
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


<div class="redcat-f">
@isset($category)
<h1 class="redcat-h1">Редактировать</h1> 
@else
<h1 class="redcat-h1">Добавить категорию</h1>
@endisset

    <form method="POST"  
        @isset($category)
action="{{ route('categories.update', $category) }}"
        @else
 action="{{ route('categories.store') }}"
        @endisset>
        
        @isset($category)
            @method('PUT')
        @endisset
       
        @csrf


<input type="text" name="name"   @isset($category) value="{{$category->name}}" @else placeholder="Название" @endisset class="redcat-ord" required>
<input type="text" pattern="[A-Za-z]+" name="code" @isset($category) value="{{$category->code}}" @else placeholder="Код" @endisset class="redcat-ordz" required>
<button class="aut-fbut" type="submit">Сохранить</button>
    </form>

</div>






</main>

</body>

<footer class="bott">
<h1 class="zag">© В гостях у Тимо</h1>
<a class="us-yes">Пользовательское соглашение</a>
</footer>

</html>