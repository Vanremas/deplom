<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orders()
    {
        $user = Auth::user();
        $orders = Order::with('user')->where('status', 1)->get();
        return view('auth.orders.orders', compact('orders','user'));
    }
    public function show(Order $order)
    {
        $user = Auth::user();
        return view('auth.orders.show', compact('order','user'));
    }
}
