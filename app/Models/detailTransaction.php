<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailTransaction extends Model
{
    use HasFactory;

    protected $table = "detailtransactions";
    public $timestamps = true;
    protected $fillable = [
        'id_transaction',
        'id_sku',
        'Qty',
        'price',
        'status',
    ];

    public function transaksi(){
        return $this->hasOne(transaction::class, 'id_transaction', 'id');
    }

    public function product(){
        return $this->hasOne(product::class, 'id_sku', 'id');
    }
}
