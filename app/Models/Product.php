<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'discount',
        'barnd',
        'model',
        'ram',
        'cpu',
        'width',
        'hight',
        'weight',
        'storage',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
