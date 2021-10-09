<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart()
    {
        return view('components.cart');
    }

    public function addToCart(Request $request)
    {
        $product = ProductController::getProduct($request->idProduct);

        $data = [
            'ID' => $product->id,
            'amount' => $request->amount,
            'name' => $product->name,
            'price' => $product->price
        ];

        $request->session()->push('Cart', $data);

        return "Success";
    }

    public function clear(Request $request)
    {
        $request->session()->forget('Cart');

        return "Success";
    }

    public function removeFromCart(Request $request)
    {
        $i = $request->index;

        $cart = $request->session()->pull('Cart', 'default');
        unset($cart[$i]);

        $request->session()->put('Cart', $cart);

        return $cart;
    }
}
