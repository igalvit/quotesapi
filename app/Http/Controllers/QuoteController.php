<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function oneRandomQuote()
    {
        $quote = Quote::with(['author', 'category'])->inRandomOrder()->first();
        return $quote;
    }

}
