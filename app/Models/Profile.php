<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = "profiles";
    public $timestamps = true;
    protected $fillable = [
        'Name',
        'Desc',
        'address',
        'maps',
        'notlp',
        'email',
        'instagram',
        'facebook',
    ];
    protected $hidden;
}
