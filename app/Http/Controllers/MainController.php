<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class MainController extends Controller
{
   public function index(){
      $categories = Category::get();
      $products = Product::get();
      $user = Auth::user();
    return view('Index', ['categories' => $categories, 'products' => $products, 'user'=>$user]);
   }

   public function category($code = null){
      $user = Auth::user();
    $category = Category::where('code', $code)->first(); // Передаёт страницу категорий
    $categories = Category::get(); // Вывод категорий
    $products = Product::where('category_id', $category->id)->get(); // Сортировка
    return view('Index', ['category' => $category, 'categories' => $categories, 'products' => $products, 'user'=>$user]);

   }

   public function product($product){
   }

}
