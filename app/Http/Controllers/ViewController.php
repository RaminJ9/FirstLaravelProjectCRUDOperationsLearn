<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    //

    public function register(){
        return view('Product.registerpage');
    }

    public function login(){
        return view('Product.loginpage');
    }

}
