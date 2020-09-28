<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function listAuthors()
    {
        return Author::simplePaginate(10);
    }

    public function listQuotesByAuthor($id)
    {
        return $quotes = Author::findOrFail($id)->quotesSaid()->simplePaginate(10);
    }

    public function createAuthor(Request $request)
    {
        $this->validate($request, [
            'author'=> 'required|unique:authors',
        ]);
        $data = new Author;
        $data->author = $request->input('author');
        $data -> save();
        return response()->json($data, 201);
    }

    public function deleteAuthor(Request $request, $id)
    {
        Category::findOrFail($id)->delete();
        return response()->json("Succesfully deleted author $id", 200);
    }

    public function updateAuthor(Request $request, $id)
    {
        $this->validate($request, [
            'author'=> 'required|unique:authors',
        ]);
        $data = Author::findOrFail($id);
        $data->category = $request->input('author');
        $data->update();
        return response()->json($data, 200);

    }
}
