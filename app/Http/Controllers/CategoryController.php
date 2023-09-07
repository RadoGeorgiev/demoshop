<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Insert new data into the db table
     */
    public static function categoryInsert(string $categoryId, string $categoryName): void
    {
        if (!self::categoryExist($categoryId)) {

            Category::create([
                'product_departmentId' => $categoryId,
                'product_department' => $categoryName,
            ]);   
        }
    }

    /**
     * Get Category Name
     */
    public static function getCategoryName(string $categoryId): string
    {
        $name = DB::table('categories')
                    ->select('product_department')
                    ->where('product_departmentId', $categoryId)
                    ->get();
        return json_decode($name)[0]->product_department;
    }
    
    /**
     * Check if category exists
     */
    public static function categoryExist(string $categoryId): bool
    {
        return Category::where('product_departmentId', $categoryId)->exists();
    }
}
