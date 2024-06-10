

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/basket.css') }}">
    @isset($product)
<title>Редактировать товар {{$product->name}}</title>
@else
<title>Добавить товар</title>
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


<div class="redprod-f">
@isset($product)
<h1 class="redcat-h1">Редактировать</h1> 
@else
<h1 class="redcat-h1">Добавить товар</h1>
@endisset

<form enctype="multipart/form-data" method="POST" 
      @isset($product)
          action="{{ route('products.update', $product) }}"
      @else
          action="{{ route('products.store') }}"
      @endisset>

    @csrf
    @isset($product)
        @method('PUT')
    @endisset

    <input type="text" name="name" @isset($product) value="{{$product->name}}" @else placeholder="Название" @endisset class="redcat-ord" required>
    <input type="text" pattern="[A-Za-z]+" name="code" @isset($product) value="{{$product->code}}" @else placeholder="Код" @endisset class="redcat-ordz" required>

    <select class="redprod-ordz" name="category_id" id="YourInputId">
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
            @isset($product) 
                @if($product->category_id == $category->id)
                    selected
                @endif
            @endisset> 
                {{ $category->name }} 
            </option>
        @endforeach
    </select>
    <input type="number" name="price" @isset($product) value="{{$product->price}}" @else placeholder="Цена" @endisset class="redcat-ordz" required>
    
    <label class="up-img">
        Загрузить
    <input type="file" name="image" style="display: none;">
</label>
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