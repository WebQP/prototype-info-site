<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Content\Shop\ShopProductController;
use App\Models\Base\Shop\BaseShopCategory;
use App\Models\Base\Shop\BaseShopProduct;
use Illuminate\Http\Request;

class DataOtherController extends Controller
{
    public function sadeBarData()
    {
        return [
            'shopCategories' => $this->shopListCategories(),
            'shopSpecialsProducts' => $this->shopSpecialsProducts(),
        ];
    }

    private function shopSpecialsProducts(): array
    {
        $getList = BaseShopProduct::where('status', 1)
            ->where('specials', 1)
            ->limit(5)
            ->get();
        $list = [];
        foreach ($getList as $item) {
            $images = unserialize($item['image_list']);
            $imageProductOne = '';
            $imageProductTwo = '';
            if (count($images) > 0) {
                $imageProductOne = $images[0]['url'];
                $imageProductTwo = $images[1]['url'];
            }
            $list[] = [
                'id' =>  $item->id,
                'slug' => '/' . $item->slug,
                'name' => $item->name,
                'price' => $item->price,
                'price_old' => $item->price_old,
                'image_1' => $imageProductOne,
                'image_2' => $imageProductTwo,
            ];
        }
        return $list;
    }

    private function shopListCategories(): array
    {
        $categoriseParentsList = BaseShopCategory::where('parent_id', 0)
            ->where('status', 1)
            ->orderBy('id', 'ASC')
            ->get();
        $listCategories = [];
        $level = 0;
        foreach ($categoriseParentsList as $item) {
            if ($item->id != 1) {
                $listCategories[] = [
                    'id' => $item->id,
                    'slug' => '/' . $item->slug,
                    'name' => $item->name,
                    'level' => 0,
                    'children' => $this->listCategoryChildren($item->id, $level),
                ];
            }
        }
        return $listCategories;

        return [];
    }

    private function listCategoryChildren($id, $level)
    {
        $getCategoriseParents = BaseShopCategory::where('parent_id', $id)
            ->where('status', 1)
            ->orderBy('id', 'ASC')
            ->get();
        $listCategories = [];
        $level++;
        foreach ($getCategoriseParents as $item) {
            $listCategories[] = [
                'id' => $item->id,
                'slug' => '/' . $item->slug,
                'name' => $item->name,
                'level' => $level,
                'children' => $this->listCategoryChildren($item->id, $level),
            ];
        }
        return $listCategories;
    }


    //Форматируем товар для категории
    public function formatProductCategory(array $data): array
    {
        $list = [];
        foreach ($data as $item) {
            $images = unserialize($item->image_list);
            $imageProductOne = '';
            $imageProductTwo = '';
            if (count($images) > 0) {
                $imageProductOne = $images[0]['url'];
                $imageProductTwo = $images[1]['url'];
            }

            $list[] = [
            'id' => $item->id,
            'slug' => '/' . $item->slug,
            'name' => $item->name,
            'price' => $item->price,
            'price_old' => $item->price_old,
            'image_1' => $imageProductOne,
            'image_2' => $imageProductTwo,
            ];
        }
        return $list;
    }

    public static function formatProductCart(object $data): array
    {
        $cartList = [];
        $cartSum = 0;
        foreach ($data as $item) {
            $product = BaseShopProduct::find($item->product_id);
            $images = unserialize($product->image_list);
            $imageProductOne = '';
            $imageProductTwo = '';
            if (count($images) > 0) {
                $imageProductOne = $images[0]['url'];
                $imageProductTwo = $images[1]['url'];
            }

            $cartList[] = [
                'id' => $product->id,
                'slug' => '/' . $product->slug,
                'name' => $product->name,
                'unique_code' => $product->unique_code,
                'price' => $product->price,
                'image_1' => $imageProductOne,
                'image_2' => $imageProductTwo,
                'countCart' =>  $item->count,
                'sum' => $product->price * $item->count,
            ];

            $cartSum += $product->price * $item->count;
        }

        return [
            'productList' => $cartList,
            'productSum' => $cartSum,
        ];
    }
}
