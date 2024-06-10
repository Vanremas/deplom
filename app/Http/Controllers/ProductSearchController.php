<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductSearchController extends Controller
{
    public function search(Request $request)
    {
        $user = Auth::user();
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        $categories = Category::all();
        return view('index', compact('products', 'query','user','categories'));
    }
}
