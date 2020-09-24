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
        $authorExists = Author::findOrFail($id)->id;
        return $quotes = Author::findOrFail($id)->quotesSaid()->simplePaginate(10);
    }
}
