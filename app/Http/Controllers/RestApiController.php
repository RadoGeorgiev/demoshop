<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;

class RestApiController extends Controller
{
    // Api return methods

    public function getCategories()
    {
        $categories = Category::distinct()->pluck('product_department');
        return response()->json($categories);
    }

    public function getProducts(Request $request, $per_page)
    {
        $perPage = $request->input('per_page', $per_page);
        $products = Products::paginate($perPage);

        return response()->json($products);
    }
}
