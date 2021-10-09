<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posters;
use App\Models\Product;

class TestesController extends Controller
{
    public function test(Request $request)
    {
        $data = [
            'ID' => $request->idProduct,
            'amount' => $request->amount,
            'name' => $request->name,
            'price' => $request->price
        ];

        $request->session()->push('Cart', $data);
    }
}
