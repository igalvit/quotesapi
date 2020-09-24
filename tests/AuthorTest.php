<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testGetAuthors()
    {
        $response = $this->json('GET', 'api/v1/authors');
        $this->assertEquals(200, $this->response->status());
    }

    public function testGetOneAuthor()
    {
        $response = $this->json('GET', 'api/v1/authors/1/quotes')
            ->seeJson([
                'current_page' => 1,
            ]);
        $this->assertEquals(200, $this->response->status());

    }
    public function testGetIncorrectAuthor()
    {
        $response = $this->json('GET', 'api/v1/authors/noExists/quotes')
            ->seeJson([
                'message' => "No data found.",
            ]);
        $this->assertEquals(200, $this->response->status());

    }
}
