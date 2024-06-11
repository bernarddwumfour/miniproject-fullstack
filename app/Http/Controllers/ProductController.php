<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationData;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return response()->json($products);
    }



    public function store(Request $request)
    {

         // Define validation rules
         $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'categories_id' => 'required|integer|min:0',
        ];

        // Validate the request
        $validatedData = $request->validate($rules);
        $product = Products::create($validatedData);
        return response()->json($product, 201);
    }

    public function show($id)
    {
        // Find the product by ID
        $product = Products::find($id);

        // Check if the product exists
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Return the product as JSON
        return response()->json($product);
    }


    public function addcategory(Request $request){
        $rules = [
            'name' => 'required|string|max:255',
        ];

        // Validate the request
        $validatedData = $request->validate($rules);
        $category = Categories::create($validatedData);
        return response()->json($category, 201);
    }
}
