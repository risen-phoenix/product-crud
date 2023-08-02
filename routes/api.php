<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('products', [ProductController::class, 'index']);
Route::post('products', [ProductController::class, 'addProduct']);
Route::get('products/{id}', [ProductController::class, 'showProduct']);
Route::get('products/{id}/edit', [ProductController::class, 'editProduct']);
Route::put('products/{id}/edit', [ProductController::class, 'updateProduct']);
Route::delete('products/{id}/delete', [ProductController::class, 'deleteProduct']);



