<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function listQuote($id)
    {
        $quote = Quote::findOrFail($id);
        return $quote;
    }
    
    public function oneRandomQuote()
    {
        $quote = Quote::with(['author', 'category'])->inRandomOrder()->first();
        return $quote;
    }

    public function listQuotes()
    {
        $quotes = Quote::simplePaginate(10);
        return $quotes;
    }

    public function createQuote(Request $request)
    {
        $this->validate($request, [
            'quote'=>'required|unique:quotes',
            'author_id'=> 'required|exists:authors,id',
            'category_id'=>'required|exists:categories,id',
        ]);
        $data = new Quote;
        $data->quote = $request->input('quote');
        $data->author_id = $request->input('author_id');
        $data->category_id = $request->input('category_id');
        $data -> save();
        return response()->json($data, 201);
    }

    public function deleteQuote(Request $request, $id)
    {
        Quote::findOrFail($id)->delete();
        return response()->json("Succesfully deleted quote $id", 200);
    }

    public function updateQuote(Request $request, $id)
    {
        $this->validate($request, [
            'quote'=>'required|unique:quotes',
            'author_id'=> 'required|exists:authors,id',
            'category_id'=>'required|exists:categories,id',
        ]);
        $data = Quote::findOrFail($id);
        $data->quote = $request->input('quote');
        $data->author_id = $request->input('author_id');
        $data->category_id = $request->input('category_id');
        $data -> save();
        return response()->json($data, 201);
    }

}
