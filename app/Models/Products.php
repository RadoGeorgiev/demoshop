<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'product_image_sm',
        'product_type',
        'product_name',
        'product_departmentId',
        'product_stock',
        'product_color',
        'product_price',
        'product_material',
        'product_ratings',
        'product_sales',
        'product_variation_ids',
    ];

    public $timestamps = false;
}
