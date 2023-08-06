<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
   /**
    * Display list of products
    *
    *
    */
    public function index()
    {
        $products = Product::orderBy("created_at",'DESC')->get();

        return view('index', compact('products'));

    }


    public function showAddProduct()
    {
        return view('addProduct');
    }


    public function addProduct(Request $request)
    {
        $validator = $request->validate(
            [
                'name' => 'required|string|min:3|max:50',
                'price' => 'required | decimal:2',
                'description' => 'required|string|min:10|max:250'
            ]
        );

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();

        return redirect()->route('index')->with('success','Product has been added successfully');


    }



    public function editProduct($productId)
    {
        $product = Product::find($productId);

        return view('editProduct', ['product' => $product]);
    }


    function updateProduct(Request $request, int $productId)
    {
            $request->validate(
            [
                'name' => 'required|string|min:3|max:50',
                'price' => 'required | decimal:2',
                'description' => 'required|string|min:10|max:250'
            ]
        );

         $product = Product::find($productId);

         $product->update([
            $product['name'] = $request->name,
            $product['price'] = $request->price,
            $product['description'] = $request->description,
         ]);

         return redirect()->route('index')->with('success','Product has been successfully updated');


        }



    function deleteProduct($productId)
    {
        $product = Product::find($productId);

            $product->delete();
            return redirect()->route('index')->with('success','Product has been deleted');

    }
}
