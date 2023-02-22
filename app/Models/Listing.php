<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'age',
        'gender',
        'weight',
        'quantity',
        'location',
        'description',
        'price',
        'seller_mobile_number',
        'photo'
    ];
}
