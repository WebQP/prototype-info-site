<?php

namespace App\Http\Controllers\Content\Shop;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataOtherController;
use App\Models\Base\Shop\BaseShopProduct;
use App\Models\BaseShopCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShopCartController extends Controller
{
    public function show(): object
    {
        //Проверяем наличие товара в корзине по пользователю или сессии
        if (Auth::check()) {
            $user = auth()->user();
            $userID = $user->id;
            $listCart = BaseShopCart::where('user_id', $user->id)->get();
        } else {
            $userID = 0;
            $sessionID = session()->getId();
            $listCart = BaseShopCart::where('user_session', $sessionID)->get();
        }
        //Проверяем наличие товара в корзине по пользователю или сессии

        $page = (object)[];
        return $page;
    }

    //Список товаров в корзине
    public function cartList(): object
    {
        //Проверяем наличие товара в корзине по пользователю или сессии
        if (Auth::check()) {
            $user = auth()->user();
            $listCart = BaseShopCart::where('user_id', $user->id)->get();
            $listCartFormat = DataOtherController::formatProductCart($listCart);
        } else {
            $sessionID = session()->getId();
            $listCart = BaseShopCart::where('user_session', $sessionID)->get();
            $listCartFormat = DataOtherController::formatProductCart($listCart);
        }
        //Проверяем наличие товара в корзине по пользователю или сессии

        $page = (object)[];
        $page->cartList = $listCartFormat['productList'];
        $page->cartSum = $listCartFormat['productSum'];
        return $page;
    }

    //Плюсуем товар в корзине
    public function plusProductToCart(Request $request)
    {
        if (Auth::check()) {
            $user = auth()->user();
            $productCart = BaseShopCart::where('user_id', $user->id)
                ->where('product_id', $request->productID)
                ->first();
        } else {
            $sessionID = session()->getId();
            $productCart = BaseShopCart::where('user_session', $sessionID)
                ->where('product_id', $request->productID)
                ->first();
        }

        $productCart->count += 1;
        $productCart->save();

        return $this->cartList();
    }

    public function minusProductToCart(Request $request): object
    {
        if (Auth::check()) {
            $user = auth()->user();
            $productCart = BaseShopCart::where('user_id', $user->id)
                ->where('product_id', $request->productID)
                ->first();
        } else {
            $sessionID = session()->getId();
            $productCart = BaseShopCart::where('user_session', $sessionID)
                ->where('product_id', $request->productID)
                ->first();
        }

        $productCart->count -= 1;
        if ($productCart->count <= 0) {
            $productCart->delete();
        } else {
            $productCart->save();
        }

        return $this->cartList();
    }

    //Удалить товар из корзины
    public function removeProductToCart(Request $request): object
    {
        if (Auth::check()) {
            $user = auth()->user();
            $productCart = BaseShopCart::where('user_id', $user->id)
                ->where('product_id', $request->productID)
                ->first();
        } else {
            $sessionID = session()->getId();
            $productCart = BaseShopCart::where('user_session', $sessionID)
                ->where('product_id', $request->productID)
                ->first();
        }

        $productCart->delete();

        return $this->cartList();
    }

    public function addProductToCart(Request $request)
    {
        $productID = $request->productID;

        //Проверяем наличие товара в корзине по пользователю или сессии
        if (Auth::check()) {
            $user = auth()->user();
            $userID = $user->id;
            $sessionID = session()->getId();
            $item = BaseShopCart::where('user_id', $user->id)
                ->where('product_id', $productID)
                ->first();
        } else {
            $userID = 0;
            $sessionID = session()->getId();
            $item = BaseShopCart::where('user_session', $sessionID)
                ->where('product_id', $productID)
                ->first();
        }
        //Проверяем наличие товара в корзине по пользователю или сессии

        //Добавляем товар или увеличиваем количество в корзине
        if (!isset($item->id)) {
            $insertCart = new BaseShopCart();
            $insertCart->user_id = $userID;
            $insertCart->user_session = $sessionID;
            $insertCart->product_id = $productID;
            $insertCart->count = 1;
            $insertCart->save();
        } else {
            $item->count = $item->count + 1;
            $item->save();
        }
        //Добавляем товар или увеличиваем количество в корзине

        if (Auth::check()) {
            $products = BaseShopCart::where('user_id', $user->id)->get();
        } else {
            $sessionID = session()->getId();
            $products = BaseShopCart::where('user_session', $sessionID)->get();
        }

        return [];
        return $this->getDataCart();
    }
    //Добавляем товар в корзину

    //Получаем данные корзины
    public function dataCart()
    {
        $listProductCart = [];
        $productSumCart = 0;
        $productCountCart = 0;

        if (Auth::check()) {
            $user = auth()->user();
            $getItemsCart = ShopCart::where('user_id', $user->id)->get();
        } else {
            $sessionID = session()->getId();
            $getItemsCart = ShopCart::where('user_session', $sessionID)->get();
        }

        foreach ($getItemsCart as $product) {
            $productData = ShopProduct::find($product->item_id);

            $name = $productData->name_ru == '' ? $productData->name : $productData->name_ru;
            $imageData = ShopProductImage::where('product_id', $product->item_id)->orderBy('id', 'ASC')->first();
            $image = $imageData->url ?? '/assets/site/img/placeholder.png';

            if ($product->size != 0) {
                $getSizeProductData = ShopProductRing::where('product_id', $product->item_id)
                    ->where('ring_id', $product->size)
                    ->first();
                $getSizeData = ShopProductSpecificationsRing::find($product->size);
                $price = $getSizeProductData->price;
                $priceOld = 0;
                $sizeName = $getSizeData->name;
            } else {
                $price = $productData->salePrices;
                $priceOld = $productData->saleOldPrices;
                $sizeName = '';
            }

            $listProductCart[] = [
                'id' => $product->item_id,
                'slug' => $productData->slug,
                'name' => $name,
                'image' => $image,
                'price' => number_format($price, 0, '', ' '),
                'priceOld' => number_format($priceOld, 0, '', ' '),
                'count' => $product->count,
                'sizeID' => $product->size,
                'sizeName' => $sizeName,
                'sum' => number_format($product->count * $price, 0, '', ' '),
            ];

            $productCountCart++;
            $productSumCart = $productSumCart + $product->count * $price;
        }

        return [
            'cartList' => $listProductCart,
            'cartCount' => $productCountCart,
            'cartSum' =>  number_format($productSumCart, 0, '', ' '),
            'cartSale' =>  number_format($productSumCart, 0, '', ' '),
        ];
    }
    //Получаем данные корзины
}
