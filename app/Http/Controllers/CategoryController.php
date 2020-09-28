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

    public function createCategory(Request $request)
    {
        $this->validate($request, [
            'category'=> 'required|unique:categories',
        ]);
        $data = new Category;
        $data->category = $request->input('category');
        $data -> save();
        return response()->json($data, 201);
    }

    public function deleteCategory(Request $request, $id)
    {
        Category::findOrFail($id)->delete();
        return response()->json("Succesfully deleted category $id", 200);
    }

    public function updateCategory(Request $request, $id)
    {
        $this->validate($request, [
            'category'=> 'required|unique:categories',
        ]);
        $data = Category::findOrFail($id);
        $data->category = $request->input('category');
        $data->update();
        return response()->json($data, 200);

    }
}
