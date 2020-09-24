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


}
