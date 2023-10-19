<?php

use App\Http\Controllers\Content\Blog\BlogCategoryController;
use App\Http\Controllers\Content\Blog\BlogPostController;
use App\Http\Controllers\Content\PageController;
use App\Http\Controllers\UploadingFilesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/upload-editor-image', [UploadingFilesController::class, 'uploadImageTiny']);
Route::post('/upload-preview-image', [UploadingFilesController::class, 'uploadImagePreview']);

Route::resource('page', PageController::class);

Route::get('blog-category/list', [BlogCategoryController::class,'listCategory']);
Route::resource('blog-category', BlogCategoryController::class);

Route::resource('blog-post', BlogPostController::class);
