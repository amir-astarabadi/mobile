<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function add(array $data)
    {
        $product = Product::find($data['product_id']);

        if ($data['quantity'] > $product->vendor) {
            throw new Exception('this amount of product does not exists in vendor');
        }

        DB::transaction(function () use ($product, $data) {

            $item = $this->items()->where('product_id', $product->id)->first();

            if (empty($item)) {
                $item = new CartItem();
                $item->cart_id = $this->id;
                $item->product_id = $product->id;
            }

            $item->unit_price = $product->price;
            $item->unit_discount = $product->discount;
            $item->quantity = $data['quantity'];

            $item->save();

            $product->update(['vendor' => $product->vendor - $data['quantity']]);

            $this->updatePrice();
        });
    }

    private function updatePrice()
    {
        $price = 0;
        foreach ($this->items as $item) {
            $price += ($item->unit_price * (1 - ($item->unit_discount / 100)) * $item->quantity);
        }

        $this->update(['price' => $price]);
    }
}
