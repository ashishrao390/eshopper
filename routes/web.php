<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\DiscountsController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SizesController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\WearTypesController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;

Route::view('/welcome','welcome');
Route::view('/welcome/{name}','welcome');

Route::get('/', [HomeController::class, 'index']);

Route::get('/shop', [ShopController::class, 'index']);
Route::get('/shop/{weartypename}', [ShopController::class, 'menuweartypes']);

Route::get('/detail', [DetailController::class, 'index']);
Route::get('/detail/{id}', [DetailController::class, 'show']);

Route::get('/cart', [CartController::class, 'index']);

Route::get('/checkout', [CheckoutController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/registration', [UserController::class, 'getUserRegistration']);
Route::post('/registration', [UserController::class, 'postUserRegistration']);

Route::get('/login', [LoginController::class, 'getUserLogin'])->name('login');
Route::post('/login', [LoginController::class, 'postUserLogin'])->name('login.perform');
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth','admin'])->prefix('student')->group(function(){
    Route::get('/', [StudentController::class, 'index']);
    Route::get('/create',[StudentController::class, 'create']);
    Route::post('/',[StudentController::class, 'store']);
    Route::get('/{id}',[StudentController::class, 'show']);
    Route::get('/{id}/edit',[StudentController::class, 'edit']);
    Route::patch('/{id}',[StudentController::class, 'update']);
    Route::delete('/{id}',[StudentController::class, 'destroy']);    
})->middleware('Admin');

Route::middleware(['auth','admin'])->prefix('brand')->group(function(){
    Route::get('/', [BrandController::class, 'index']);
    Route::get('/create',[BrandController::class, 'create']);
    Route::post('/',[BrandController::class, 'store']);
    Route::get('/{id}',[BrandController::class, 'show']);
    Route::get('/{id}/edit',[BrandController::class, 'edit']);
    Route::patch('/{id}',[BrandController::class, 'update']);
    Route::delete('/{id}',[BrandController::class, 'destroy']);
});

Route::middleware(['admin'])->prefix('sizes')->group(function(){
    Route::get('/', [SizesController::class, 'index']);
    Route::get('/create',[SizesController::class, 'create']);
    Route::post('/',[SizesController::class, 'store']);
    Route::get('/{id}',[SizesController::class, 'show']);
    Route::get('/{id}/edit',[SizesController::class, 'edit']);
    Route::patch('/{id}',[SizesController::class, 'update']);
    Route::delete('/{id}',[SizesController::class, 'destroy']);
});

Route::middleware(['admin'])->prefix('categories')->group(function(){
    Route::get('/', [CategoriesController::class, 'index']);
    Route::get('/create',[CategoriesController::class, 'create']);
    Route::post('/',[CategoriesController::class, 'store']);
    Route::get('/{id}',[CategoriesController::class, 'show']);
    Route::get('/{id}/edit',[CategoriesController::class, 'edit']);
    Route::patch('/{id}',[CategoriesController::class, 'update']);
    Route::delete('/{id}',[CategoriesController::class, 'destroy']);
});

Route::middleware(['admin'])->prefix('colors')->group(function(){
    Route::get('/', [ColorsController::class, 'index']);
    Route::get('/create',[ColorsController::class, 'create']);
    Route::post('/',[ColorsController::class, 'store']);
    Route::get('/{id}',[ColorsController::class, 'show']);
    Route::get('/{id}/edit',[ColorsController::class, 'edit']);
    Route::patch('/{id}',[ColorsController::class, 'update']);
    Route::delete('/{id}',[ColorsController::class, 'destroy']);
});

Route::middleware(['admin'])->prefix('weartypes')->group(function(){
    Route::get('/', [WearTypesController::class, 'index']);
    Route::get('/create',[WearTypesController::class, 'create']);
    Route::post('/',[WearTypesController::class, 'store']);
    Route::get('/{id}',[WearTypesController::class, 'show']);
    Route::get('/{id}/edit',[WearTypesController::class, 'edit']);
    Route::patch('/{id}',[WearTypesController::class, 'update']);
    Route::delete('/{id}',[WearTypesController::class, 'destroy']);
});

Route::middleware(['admin'])->prefix('gender')->group(function(){
    Route::get('/', [GenderController::class, 'index']);
    Route::get('/create',[GenderController::class, 'create']);
    Route::post('/',[GenderController::class, 'store']);
    Route::get('/{id}',[GenderController::class, 'show']);
    Route::get('/{id}/edit',[GenderController::class, 'edit']);
    Route::patch('/{id}',[GenderController::class, 'update']);
    Route::delete('/{id}',[GenderController::class, 'destroy']);
});

Route::middleware(['admin'])->prefix('discounts')->group(function(){
    Route::get('/', [DiscountsController::class, 'index']);
    Route::get('/create',[DiscountsController::class, 'create']);
    Route::post('/',[DiscountsController::class, 'store']);
    Route::get('/{id}',[DiscountsController::class, 'show']);
    Route::get('/{id}/edit',[DiscountsController::class, 'edit']);
    Route::patch('/{id}',[DiscountsController::class, 'update']);
    Route::delete('/{id}',[DiscountsController::class, 'destroy']);
    
});

Route::middleware(['admin'])->prefix('products')->group(function(){
    Route::get('/', [ProductsController::class, 'index']);
    Route::get('/create',[ProductsController::class, 'create']);
    Route::post('/',[ProductsController::class, 'store']);
    Route::get('/{id}',[ProductsController::class, 'show']);
    Route::get('/{id}/edit',[ProductsController::class, 'edit']);
    Route::patch('/{id}',[ProductsController::class, 'update']);
    Route::delete('/{id}',[ProductsController::class, 'destroy']);    
});

Route::middleware(['admin'])->prefix('stock')->group(function(){
    Route::get('/', [StockController::class, 'index']);
    Route::get('/create',[StockController::class, 'create']);
    Route::post('/',[StockController::class, 'store']);
    Route::get('/{id}',[StockController::class, 'show']);
    Route::get('/{id}/edit',[StockController::class, 'edit']);
    Route::patch('/{id}',[StockController::class, 'update']);
    Route::delete('/{id}',[StockController::class, 'destroy']);
});
Route::post('/stock/select-product', [StockController::class, 'selectProduct']);

Route::middleware(['admin'])->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/create',[AdminController::class, 'create']);
    Route::post('/',[AdminController::class, 'store']);
    Route::get('/{id}',[AdminController::class, 'show']);
    Route::get('/{id}/edit',[AdminController::class, 'edit']);
    Route::patch('/{id}',[AdminController::class, 'update']);
    Route::delete('/{id}',[AdminController::class, 'destroy']);
});
Route::post('/admin/select-email', [AdminController::class, 'selectEmail']);

Route::middleware(['admin'])->prefix('user')->group(function(){
    Route::get('/', [UserController::class, 'index']);
//    Route::get('/create',[UserController::class, 'getUserRegistration']);
//    Route::post('/',[UserController::class, 'postUserRegistration']);
    Route::get('/{id}',[UserController::class, 'show']);
    Route::get('/{id}/edit',[UserController::class, 'edit']);
    Route::patch('/{id}',[UserController::class, 'update']);
    Route::delete('/{id}',[UserController::class, 'destroy']);
});

Route::middleware(['admin'])->prefix('sales')->group(function(){
    Route::get('/', [SalesController::class, 'index']);
    Route::get('/create',[SalesController::class, 'create']);
    Route::post('/',[SalesController::class, 'store']);
    Route::get('/{id}',[SalesController::class, 'show']);
    Route::get('/{id}/edit',[SalesController::class, 'edit']);
    Route::patch('/{id}',[SalesController::class, 'update']);
    Route::delete('/{id}',[SalesController::class, 'destroy']);
});