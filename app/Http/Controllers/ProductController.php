<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// using the product model, cuz we need to communicate through that to store data in the database.
use App\Models\Product;

class ProductController extends Controller
{
    // controller part of the mvc


    // Request $request makes an object being "$request" and all of the data that is stored will be stored inside of it, ex ['name'=>'jack', 'ln'=>'sparrow']
    public function store(Request $request)
    {
        // validates that each of these datas are in the correct form before saving.
        $data = $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);
        // saving it in $newProduct is not needed, since we dont end up using the variable for anything
        $newProduct = Product::create($data);
        return redirect(route('product.index'));
    }

    // with the help of this method we can update the data of a product which we change with the edit function
    // husk find ud af request delen hvad det betyder
    public function update(Product $product, Request $request)
    {
         $data = $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);
        $product->update($data);
        // "success" bruges til at sige hvis session er success skal den printe den anden tekst, men der ska mere kode til man skal lave if statement i html file
        return redirect(route('product.index')) ->with('success','Product Updated Successfully');
    }
    
    public function delete(Product $product)
    {
        $product->delete();
        return redirect(route('product.index')) -> with('success','Product has been deleted');
    }
}
