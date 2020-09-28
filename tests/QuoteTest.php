<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class QuoteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testGetAllQuotes()
    {
        $response = $this->json('GET', 'api/v1/quotes');
        $this->assertEquals(200, $this->response->status());
    }

    public function testGetOneRandomQuote()
    {
        $response = $this->json('GET', 'api/v1/quotes/random')
            ->seeJsonStructure([
            'id', 'quote', 'author', 'category'
        ]);
        $this->assertEquals(200, $this->response->status());

    }

    public function testGetOneExistingQuote()
    {
        $response = $this->json('GET', 'api/v1/quotes/1')
            ->seeJsonStructure([
                'id', 'quote', 'author', 'category'
            ]);
        $this->assertEquals(200, $this->response->status());

    }

    public function testGetOneIncorrectQuote()
    {
        $response = $this->json('GET', 'api/v1/quotes/InexistentQuote')
            ->seeJson([
                'message' => "No data found.",
            ]);
        $this->assertEquals(200, $this->response->status());

    }
}
