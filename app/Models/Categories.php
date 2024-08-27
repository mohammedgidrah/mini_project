<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class categories extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'category_name',
        'category_description',  
        'image',  
    ];
    // public function product()
    // {
    //     return $this->hasMany(Product::class);
    // }
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
