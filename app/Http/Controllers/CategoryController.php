<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function listCategories()
    {
        return Category::all()->simplePaginate(10);
    }

    public function listQuotesByCategory($category)
    {
        $categoryExists = Category::where('category','=', $category)->first();
        if ($categoryExists)
        {
            $id = $categoryExists->id;
            return $quotes = Category::find($id)->phrases()->simplePaginate(10);
        }
        else{
            return response()->json([
                'message' => "Category $category not found",
            ], 404);
        }
    }
}
