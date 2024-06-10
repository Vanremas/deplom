<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'code',
        'price',
        'image'
    ];

public function getCategory(){

return $category = Category::where('id', $this->category_id)->first();

}
// public function category()
// {
//     return $this->belongsTo(Category::class);
// }

public function getPriceForCount()
{
 if (!is_null($this->pivot)){
return $this->pivot->count * $this->price;

 }
 return $this->price;
}
}
