<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// this is the route part of the mvc, when u change the url, u get to a different part. based on the commands u make
Route::get('/', function () { // this was already here, this is the welcome view, if there is nothing behind the url, this would be the default
    return view('welcome');
});

// here we make a new route, to the product view.
// "get" gets information, "/product" the url, "index" calls the method called index, name of route being "product.index"
Route::get('/product',[ProductController::class, 'index'])->name('product.index');
Route::get('/product/create',[ProductController::class, 'create'])->name('product.create');

// "post" it posts information "/product" the url, "store" calls the function called store, "product.store" the name of the route, so to use the route u call it by its name
Route::post('/product',[ProductController::class, 'store'])->name('product.store');
// an get cuz its edit page
Route::get('/product/{product}/edit',[ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update',[ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/delete',[ProductController::class, 'delete'])->name('product.delete');


// homepage
Route::get('/', function(){
return view('Product.homepage');
})->name('goto.homepage');


// Authentication
    // Views
Route::get('/register', [ViewController::class, 'register'])->name('show.register');
Route::get('/login', [ViewController::class, 'login'])->name('show.login');

    // Authentication / methods
