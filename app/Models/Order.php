<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function products()
    {
    return $this->belongsToMany(Product::class)->withPivot('count');

    }

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    public function getFullPrice()
    {
        $sum = 0;
    foreach ($this->products as $product){
    
    $sum += $product->getPriceForCount();}
    return $sum;
    }

    public function saveOrder($name, $vk)
    {

    if($this->status ==0){
        $this->name = $name;
        $this->vk = $vk;
        $this ->status = 1;
        $this->save();
        session()->forget('orderId');
        return true;
} else {return false;}

       
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
}

