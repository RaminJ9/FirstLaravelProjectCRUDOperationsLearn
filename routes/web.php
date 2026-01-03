<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ViewController;

// this is the route part of the mvc, when u change the url, u get to a different part. based on the commands u make


// here we make a new route, to the product view.
// "get" gets information, "/product" the url, "index" calls the method called index, name of route being "product.index"

// View Route

    // CRUD Views
Route::get('/product',[ViewController::class, 'index'])->name('product.index');
Route::get('/product/create',[ViewController::class, 'create'])->name('product.create');
Route::get('/product/{product}/edit',[ViewController::class, 'edit'])->name('product.edit')->middleware('auth');
Route::get('/',[ViewController::class, 'homepage'])->name('goto.homepage');

    // Authentication Views
Route::get('/register', [ViewController::class, 'register'])->name('show.register');
Route::get('/login', [ViewController::class, 'login'])->name('login');

// since only authorized personel should be access these routes, we will use something called authentication middleware.
// We will do it in 2 ways, one in a single line where only one route is affected, another where multiple routes will be affected by the middleware.

// Function functions, non view routes.
    // CRUD Operations
        // "post" it posts information "/product" the url, "store" calls the function called store, "product.store" the name of the route, so to use the route u call it by its name
        Route::post('/product',[ProductController::class, 'store'])->name('product.store')->middleware('auth');
        // METHOD 1 (Above) "middleware('auth')", is a premade middleware by laravel, which makes it so that if an person isnt authenticated, they will be redirected to the route called "login"

        // METHOD 2 (Below), we group the routes, so they follow the middleware authentication, there is also something else we could add, if they all were using the same controller, u can see the yt tut if u want. it shows what the additions does (lesson: 8, time: 5:22).
Route::middleware('auth')->group(function (){
Route::put('/product/{product}/update',[ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/delete',[ProductController::class, 'delete'])->name('product.delete');
});
    // Authentication
Route::middleware('guest')->group(function(){
Route::post('/register', [AuthController::class, 'register'])->name('try.register');
Route::post('/login', [AuthController::class, 'login'])->name('try.login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('try.logout');


