<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = "products";
    public $timestamps = true;
    protected $fillable = [
        'sku',
        'nameProduct',
        'type',
        'category',
        'price',
        'discount',
        'quantity',
        'quantityOut',
        'image',
        'isActive',
    ];
    // protected $hidden;
}
