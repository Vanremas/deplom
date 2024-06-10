<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Person\OrderPController;
use App\Http\Controllers\Person\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false
]);
Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');

// Проверка Авторизации
Route::middleware(['auth'])->group(function(){
// Пользователь
Route::get('/home', [UserController::class, 'home'])->name('person.home');

Route::group([
'prefix'=>'person',
'as'=>'person.'


], function(){
    Route::get('/orders', [OrderPController::class, 'orders'])->name('orders.orders');
    Route::get('/orders/{order}', [OrderPController::class, 'show'])->name('orders.show');

});
// Конец пользователя

// Админка
    Route::group([
        'prefix'=>'admin'
        ], function(){
        
            
            Route::group(['middleware'=>'is_admin'], function(){
                Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
                Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
                Route::resource('categories', CategoryController::class);
                Route::resource('products', ProductController::class);
        
        
            });
        });
// Конец админки

        // Конец Авторизации

});





// Проверка авторизации для корзины
Route::group(['middleware'=>'auth',], function(){

    Route::group(['prefix' => 'basket'], function(){
Route::get('/', [BasketController::class, 'basket'])->name('basket');
Route::post('/add/{product}', [BasketController::class, 'basketAdd'])->name('basket-add');

Route::group([
    'middleware' => 'basket_not_empty',
], function(){
    

Route::get('/place', [BasketController::class, 'basketPlace'])->name('basket-place');
Route::post('/remove/{product}', [BasketController::class, 'basketRemove'])->name('basket-remove');
Route::post('/place', [BasketController::class, 'basketConfirm'])->name('basket-confirm');

});

});

});
//Конец Проверки авторизации для корзины




// Route::get('/', [MainController::class, 'product']);
Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/search', [ProductSearchController::class, 'search'])->name('search');

Route::get('/{category}', [MainController::class, 'category']);

