<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ViewController extends Controller
{
    //

    public function register(){
        return view('Product.registerpage');
    }

    public function login(){
        return view('Product.loginpage');
    }

    //these 2 index and create are for return a view
    public function index()
    {
        $product = Product::all(); // all of the data in the table / model called "Product" will be saved in $product
        return view('Product.index',['products' =>$product]);
    // [] part means that, inside the view we can use the variable "products" stored in the variable "$product", through the controller        
    }

    public function create()
    {
        return view('product.create');
    }

    // it takes in a product to know which product to edit
    // we take the product, from the Product model
    // this is only used to change the data, to save it we use the update method below
    public function edit(Product $product)
    {
        return view('product.edit',['product' => $product]);
    }


    public function homepage(){
        return view('Product.homepage');
    }


}
