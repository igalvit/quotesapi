<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testGetCategories()
    {
        $response = $this->json('GET', 'api/v1/categories');
        $this->assertEquals(200, $this->response->status());
    }

    public function testGetQuotesFromOneCategory()
    {
        $response = $this->json('GET', 'api/v1/categories/age/quotes')
            ->seeJson([
                'current_page' => 1,
            ]);
        $this->assertEquals(200, $this->response->status());

    }
    public function testGetQuotesFromOneIncorrectCategory()
    {
        $response = $this->json('GET', 'api/v1/categories/ages/quotes')
            ->seeJson([
                'message' => "No data found.",
            ]);
        $this->assertEquals(200, $this->response->status());

    }
}
