<?php

namespace App\Http\Controllers;

use App\Models\ProductVariation;
use Illuminate\Support\Facades\DB;

class ProductVariationController extends Controller
{
    /**
     * Insert new data into the db table
     */
    public static function variationsInsert(string $id): void
    {
        // product id is unknown yet, will update when second product is added to the group
        $variations = '';

        ProductVariation::create([
            'group_id' => $id,
            'product_variation_ids' => $variations,
        ]);
    }

    /**
     * Update new data into the db table
     */
    public static function variationsUpdate(string $group_id): void
    {
        // select recorded products of the group
        $variations = DB::table('products')
                ->select('id')
                ->where('group_id', $group_id)
                ->get();

        // update variations table
        DB::table('product_variations')
            ->where('group_id', $group_id)
            ->update(['product_variation_ids' => implode(",", [json_decode($variations)[0]->id])]);

        // update product table
        DB::table('products')
            ->where('group_id', $group_id)
            ->update(['product_variation_ids' => implode(",", [json_decode($variations)[0]->id])]);   
    }
    
    /**
     * Check if product variations group exists
     */
    public static function productGroupExist(string $id): bool
    {
        return ProductVariation::where('group_id', $id)->exists();
    }
}
