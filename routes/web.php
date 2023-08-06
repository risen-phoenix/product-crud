<?php

      use App\Http\Controllers\ProductController;
      use App\Models\Product;
      use Illuminate\Support\Facades\Route;

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
// Route::resource('product', ProductController::class);

      Route::get('/',[ProductController::class, 'index']
      )->name('index');
      Route::get('product', [ProductController::class, 'showAddProduct'])->name('add-product');
      Route::post('product', [ProductController::class, 'addProduct'])->name('post-product');
      Route::get('product/edit/{id}/', [ProductController::class, 'editProduct'])->name('edit');
      Route::put('product/update/{id}', [ProductController::class, 'updateProduct'])->name('update');
      Route::delete('product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete');
