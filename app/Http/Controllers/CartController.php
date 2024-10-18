<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\CartUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function update(CartUpdateRequest $request)
    {
        $openCart = Auth::user()->getOrCreateOpenCart();

        $openCart->add($request->validated());

        return response([
            'message' => 'product added to cart successfully.',
            'cart' => $openCart
        ]);
    }
}
