<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Return a list of products
     *
     * @Route("/products')
     * @Method("GET")
     *
     */
    public function index()
    {
        $allProducts = Product::all();
        if ($allProducts->count() > 0) {
            return response()->json(['status' => 200, 'products' => $allProducts], 200);
        } else {
            return response()->json(['status' => 404, 'message' => "No records found"], 404);
        }
    }

    /**
     * Add a new product to db
     * @Route("/products")
     * @Method("POST")
     *
     * @return Response
     *
     */
    public function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:50',
            'price' => 'required | decimal:2',
            'description' => 'required|string|min:10|max:250'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'message' => $validator->messages()], 422);
        } else {
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description
            ]);

            if ($product) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Product successfully created'
                ], 200);
            } else {
                return response()->json(['status' => 500, 'message' => 'Something went wrong'], 500);
            }
        }
    }

    /**
     * Returns the product information
     * @Route("/products/{id}')
     * @Method("GET")
     *
     * @return  Response
     */
    public function showProduct($ProductId)
    {
        $product = Product::find($ProductId);
        if ($product) {
            return response()->json([
                'status' => 200,
                'message' => $product
            ], 200);
        } else {
            return response()->json(['status' => 404, 'message' => "Product not found"], 404);
        }
    }

    /**
     * Find product by id
     *
     * @Route("/products/{id}/edit")
     * @Method("GET")
     *
     * @return Response
     *
     */
    public function editProduct(int $productId, Request $request)
    {
        $product = Product::find($productId);

        if ($product) {
            return response()->json(['status' => 200, 'product' => $product], 200);
        } else {
            return response()->json(['status' => 404, 'message' => "Product not found"], 404);
        }
    }

    /**
     * Update a product
     *
     * @Route("/products/{id}/edit")
     * @Method("PUT")
     *
     * @return Response
     */
    public function updateProduct(Request $request, int $productId)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:50',
            'price' => 'required | decimal:2',
            'description' => 'required|string|min:10|max:250'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'message' => $validator->messages()], 422);
        } else {
            $product = Product::find($productId);

            if ($product) {
                $product->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->description
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Product successfully updated'
                ], 200);
            } else {
                return response()->json(['status' => 404, 'message' => 'No product found'], 500);
            }
        }
    }

    /**
     * Delete a product
     *
     * @Route("/products/{id}/delete")
     * @Method("DELETE")
     *
     * @return Response
     */
    public function deleteProduct(int $productId)
    {
        $product = Product::find($productId);
        if ($product) {
            $product->delete();
            return response()->json(['status' => 200, 'message' => 'Successfully deleted'], 200);
        } else {
            return response()->json(['status' => 404, 'message' => "Product not found"], 404);
        }
    }
}
