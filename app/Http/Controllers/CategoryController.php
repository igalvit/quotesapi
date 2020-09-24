<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function listCategories()
    {
        return Category::simplePaginate(10);
    }

    public function listQuotesByCategory($category)
    {
        $categoryExists = Category::where('category','=', $category)->firstOrFail();
        return $quotes = Category::find($categoryExists->id)->phrases()->simplePaginate(10);
    }
}
