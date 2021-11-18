<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
/**
 * Home page route
 */
Route::get('/', function () {
    return view('dashtemp.index');
})->name('dashboard');

//products
Route::get('/products',  [ProductController::class, 'show'] )->name('product'); 
//products import route
Route::post('/products/import',  [ProductController::class, 'store'] )->name('importfile');