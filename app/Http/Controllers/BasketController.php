<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
class BasketController extends Controller
{
    public function basket()
    {
        $user = Auth::user();
        $orderId = session('orderId');
        $order = null;
        if (!is_null($orderId)){
            $order = Order::findOrFail($orderId);
        }
        return view('basket', compact('order', 'user'));
    }
    public function basketConfirm(Request $request)
    {
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('index');
        }
        $order=Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->vk);

        if($success){
            session()->flash('success', 'Заказ в обработке!');
        } else{
            session()->flash('warning', 'Произошла ошибка');
        }
       
        return redirect()->route('index');
    }

    public function basketPlace()
    {
        $user = Auth::user();
        $orderId = session('orderId');
        if(is_null($orderId)){
         return redirect()->route('index');
}
        $order=Order::find($orderId);

        return view('order', compact('order','user'));
    }
    
    public function basketAdd($productId)
    {
       $orderId = session('orderId');
       if (is_null($orderId)){
            $order = Order::create();
            $orderId = $order->id;
            session(['orderId'=> $orderId]);
        } else{
            $order = Order::find($orderId);
        }
        if (!is_null($order)) {

            if(Auth::check()){
                $order->user_id = Auth::id();
                $order->save();
                }

            $order->products()->attach($productId); 
            return redirect()->route('basket');
        }
    
       
        
    }

    public function basketRemove($productId){
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('basket');

        }
        $order = Order::find($orderId);
        $order->products()->detach($productId);
        return redirect()->route('basket');
    }
}
