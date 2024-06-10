<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderPController extends Controller
{
    public function orders()
    {
        $user = Auth::user();

        $orders = Auth::user()->orders()->with('user')->where('status', 1)->get();
        return view('auth.orders.orders', compact('orders','user'));
    }
    public function show(Order $order)
    {
        $user = Auth::user();

       if(!Auth::user()->orders->contains($order)){
        return back();

       }
        return view('auth.orders.show', compact('order', 'user'));
    }
}
