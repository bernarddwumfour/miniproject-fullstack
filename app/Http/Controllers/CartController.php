<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Define validation rules
        $rules = [
            'products_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ];

        // Validate the request
        $validatedData = $request->validate($rules);

        // Add product to the cart

        $cart = Cart::create([
            'products_id' => $validatedData['products_id'],
            'quantity' => $validatedData['quantity'],
        ]);


        // Return a JSON response with the cart item
        return response()->json($cart, 201);
    }

    // Method to show the cart contents
    public function show($id)
    {
        // Find the cart item by ID
        $cartItem = Cart::find($id);

        // Check if the cart item exists
        if (!$cartItem) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        // Return the cart item as JSON
        return response()->json($cartItem);
    }
}
