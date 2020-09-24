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
        $authorExists = Author::find($id);
        if ($authorExists)
        {
            return $quotes = Author::findOrFail($id)->quotesSaid()->simplePaginate(10);
        }
        else 
        {
            return response()->json([
                'error' => "Author with id $id not found.",
            ], 404);
        }
    }
}
