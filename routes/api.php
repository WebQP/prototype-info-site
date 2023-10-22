<?php

use App\Http\Controllers\Content\Blog\BlogCategoryController;
use App\Http\Controllers\Content\Blog\BlogPostController;
use App\Http\Controllers\Content\PageController;
use App\Http\Controllers\Content\Shop\ShopBrandController;
use App\Http\Controllers\Content\Shop\ShopCategoryController;
use App\Http\Controllers\Content\Shop\ShopProductController;
use App\Http\Controllers\UploadingFilesController;
use Illuminate\Support\Facades\Route;

Route::post('/upload-editor-image', [UploadingFilesController::class, 'uploadImageTiny']);
Route::post('/upload-preview-image', [UploadingFilesController::class, 'uploadImagePreview']);
Route::post('/upload-slider-image', [UploadingFilesController::class, 'uploadImagePreview']);

Route::resource('page', PageController::class);

//Блог
Route::get('blog-category/list', [BlogCategoryController::class,'listCategory']);
Route::resource('blog-category', BlogCategoryController::class);
Route::resource('blog-post', BlogPostController::class);

//Магазин
Route::get('shop-category/list', [ShopCategoryController::class,'listCategory']);
Route::resource('shop-category', ShopCategoryController::class);
Route::get('shop-brand/list', [ShopBrandController::class,'listBrand']);
Route::resource('shop-brand', ShopBrandController::class);
Route::resource('shop-product', ShopProductController::class);
