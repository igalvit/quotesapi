<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\User;

class CategoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testGetCategories()
    {
        $this->user = User::factory()->make();
        $response = $this->actingAs($this->user)->json('GET', 'api/v1/categories');
        $this->assertEquals(200, $this->response->status());
    }

    public function testGetQuotesFromOneCategory()
    {
        $this->user = User::factory()->make();
        $response = $this->actingAs($this->user)->json('GET', 'api/v1/categories/age/quotes')
            ->seeJson([
                'current_page' => 1,
            ]);
        $this->assertEquals(200, $this->response->status());

    }
    public function testGetQuotesFromOneIncorrectCategory()
    {
        $this->user = User::factory()->make();
        $response = $this->actingAs($this->user)->json('GET', 'api/v1/categories/ages/quotes')
            ->seeJson([
                'message' => "No data found.",
            ]);
        $this->assertEquals(200, $this->response->status());

    }
}
