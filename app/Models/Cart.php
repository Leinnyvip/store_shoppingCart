<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'price',
        'total',
        'date_sale'
    ];

    // Cliente que hace la compra
    public function Customer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

   // Productos añadidos al carrito
    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }


}
