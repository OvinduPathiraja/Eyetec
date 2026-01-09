<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'brand_name',
        'product_category',
        'description',
        'specification',
        'price',
        'discount',
        'image',
        'new_stock',
        'stock_status',
        'stock'
    ];

    public function models()
    {
        return $this->hasMany(ProductModel::class);
    }
}
