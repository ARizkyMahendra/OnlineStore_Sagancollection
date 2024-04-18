<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $table = "transactions";
    public $timestamps = true;
    protected $fillable = [
        'codeTransaction',
        'totalQty',
        'totalPrice',
        'costumerName',
        'address',
        'notlp',
        'ekspedisi',
    ];
    protected $hidden;
}
