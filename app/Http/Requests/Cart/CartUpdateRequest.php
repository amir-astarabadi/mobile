<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;

class CartUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => ['exists:products,id'],
            'quantity' => ['integer', 'min:1']
        ];
    }
}
