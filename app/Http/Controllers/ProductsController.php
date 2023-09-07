<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Insert new data into the db table
     */
    public static function productInsert(array $item): void
    {
        if (!self::productExist($item)) {

            CategoryController::categoryInsert($item['product_departmentId'], $item['product_department']);

            Products::create([
                    'group_id' => $item['_id'],  // group id
                    'product_image_sm' => $item['product_image_sm'],
                    'product_type' => $item['product_type'],
                    'product_name' => $item['product_name'],
                    'product_departmentId' => $item['product_departmentId'],
                    'product_stock' => $item['product_stock'],
                    'product_color' => $item['product_color'],
                    'product_price' => $item['product_price'],
                    'product_material' => $item['product_material'],
                    'product_ratings' => $item['product_ratings'],
                    'product_sales' => $item['product_sales'],
                    'product_variation_ids' => '', // enter empty as we dont know yet the product id
            ]);
        }
    }
    
    /**
     * Check if product exists
     */
    public static function productExist(array $item): bool
    {
        $is_in_table = DB::table('products')
                            ->where('group_id', $item['_id'])
                            ->where('product_color', $item['product_color'])
                            ->where('product_material', $item['product_material'])
                            ->exists();

        return $is_in_table;
    }
}
