<?php

namespace App\Http\Controllers;

use App\Models\ExternalData;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductVariationController;
use Illuminate\Support\Facades\Http;

class ExternalDataController extends Controller
{
    /**
     * Read Api EP and save new data
     */
    public static function fetchDataAndSave()
    {
        // Fetch data from the external API
        $response = Http::get('https://demoshopapi.keydev.eu/api/v1/products');

        if ($response->successful()) {
            $data = $response->json()['data'];

            // truncate last state before saving new data
            ExternalData::truncate();

            // Loop through the data and save it in the database if it does not exist
            foreach ($data as $item) {

                ProductsController::productInsert($item);

                if (!ProductVariationController::productGroupExist($item['_id'])) {
                    ProductVariationController::variationsInsert($item['_id']);
                } else {
                    ProductVariationController::variationsUpdate($item['_id']);
                }

                // keep the latest update for reference
                ExternalData::create([
                    'product_id' => $item['_id'],  // product/group id
                    'product_image_sm' => $item['product_image_sm'],
                    'product_image_md' => $item['product_image_md'],
                    'product_image_lg' => $item['product_image_lg'],
                    'product_type' => $item['product_type'],
                    'product_name' => $item['product_name'],
                    'product_department' => $item['product_department'],
                    'product_departmentId' => $item['product_departmentId'],
                    'product_stock' => $item['product_stock'],
                    'product_color' => $item['product_color'],
                    'product_price' => $item['product_price'],
                    'product_material' => $item['product_material'],
                    'product_ratings' => $item['product_ratings'],
                    'product_sales' => $item['product_sales'],
                ]);
            }

            return response()->json(['message' => 'Data saved successfully']);
        }

        return response()->json(['message' => 'Failed to fetch data from the API'], 500);
    }
}
