<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Temporary store api data
 */
class ExternalData extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_image_sm',
        'product_image_md',
        'product_image_lg',
        'product_type',
        'product_name',
        'product_department',
        'product_departmentId',
        'product_stock',
        'product_color',
        'product_price',
        'product_material',
        'product_ratings',
        'product_sales',
    ];

    public $timestamps = false;
}
