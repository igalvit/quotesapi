<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\Quote;
use App\Models\User;

class QuoteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testGetAllQuotes()
    {
        $this->user = User::factory()->make();
        $response = $this->actingAs($this->user)->json('GET', 'api/v1/quotes');
        $this->assertEquals(200, $this->response->status());
    }

    public function testGetOneRandomQuote()
    {
        $this->user = User::factory()->make();
        $response = $this->actingAs($this->user)->json('GET', 'api/v1/quotes/random')
            ->seeJsonStructure([
            'id', 'quote', 'author', 'category'
        ]);
        $this->assertEquals(200, $this->response->status());

    }

    public function testGetOneExistingQuote()
    {
        $this->user = User::factory()->make();
        $response = $this->actingAs($this->user)->json('GET', 'api/v1/quotes/1')
            ->seeJsonStructure([
                'id', 'quote', 'author', 'category'
            ]);
        $this->assertEquals(200, $this->response->status());

    }

    public function testGetOneIncorrectQuote()
    {
        $this->user = User::factory()->make();
        $response = $this->actingAs($this->user)->json('GET', 'api/v1/quotes/InexistentQuote')
            ->seeJson([
                'message' => "No data found.",
            ]);
        $this->assertEquals(200, $this->response->status());

    }
//CAMBIAR NO SIRVE
    public function testEmptyAuthorQuote()
    {
        $quote = new Quote;
        $this->assertEquals(null, $quote->toArray()["author"]);
    }
}
