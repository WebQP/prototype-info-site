<?php

use App\Http\Controllers\BaseNavigationController;
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



Route::get('/manager/{any}', function () {
    return view('control-panel.app');
})->where('any', '.*');

Route::get('/', [BaseNavigationController::class, 'index']);
Route::get('/{slag}', [BaseNavigationController::class, 'route']);
