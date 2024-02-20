<?php

use App\Http\Controllers\BaseNavigationController;
use App\Http\Controllers\Content\Shop\ShopCartController;
use App\Services\Localization\LocalizationService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Корзина
Route::post('shop-cart/add', [ShopCartController::class,'addProductToCart']);
Route::post('shop-cart/plus', [ShopCartController::class,'plusProductToCart']);
Route::post('shop-cart/minus', [ShopCartController::class,'minusProductToCart']);
Route::post('shop-cart/remove', [ShopCartController::class,'removeProductToCart']);
Route::get('shop-cart/list', [ShopCartController::class,'cartList']);
Route::get('cart', [BaseNavigationController::class,'cart']);

Route::get('/manager/{any}', function () {
    return view('control-panel.app');
})->where('any', '.*');

Route::group(
    [
        'prefix' => LocalizationService::locale(),
        'middleware' => 'setLocale'
    ],
    function () {
        Route::get('/', [BaseNavigationController::class, 'index']);
        Route::get('/{slag}', [BaseNavigationController::class, 'route']);
    }
);
