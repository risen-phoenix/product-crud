<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function deleteProduct(Product $product, Request $request){
        $product->delete();

        return redirect('/');
    }

    public function updateProduct(Product $product, Request $request)
    {
        $formFieldData = $request->validate([
            'productName' => ['required'],
            'productPrice' => ['required'],
            'productDescription' => ['required']
        ]);

        $formFieldData['productName'] = strip_tags($formFieldData['productName']);
        $formFieldData['productPrice'] = strip_tags($formFieldData['productPrice']);
        $formFieldData['productDescription'] = strip_tags($formFieldData['productDescription']);

        $product->update($formFieldData);

        return redirect('/');
    }
    public function showEditProduct(Product $product)
    {
        return view('edit-product', ['product' => $product]);
    }

    public function addProduct(Request $request)
    {
        $formFieldData = $request->validate([
            'productName' => ['require', 'min:3', 'max:50'],
            'productPrice' => ['required'],
            'productDescription' => ['required', 'min:10', 'max:150']
        ]);

        $formFieldData['productName'] = strip_tags($formFieldData['productName']);
        $formFieldData['productPrice'] = strip_tags($formFieldData['productPrice']);
        $formFieldData['productDescription'] = strip_tags($formFieldData['productDescription']);
        Product::create($formFieldData);


        return redirect('/');
    }
}
