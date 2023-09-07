<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'group_id',
        'product_variation_ids',
    ];

    public $timestamps = false;
}
