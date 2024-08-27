<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homeproduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_description',
        'category_id',
        'image',
        'category_description',
        'product_price',
        
    ];
}
