<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Http\RedirectResponse;

$router->get('/', function () {
    return redirect('doc.html');
});
$router->group(['prefix'=> 'api/v1'], function () use($router) {
    $router->get('/quotes', 'QuoteController@listQuotes');
    $router->get('/quotes/random', 'QuoteController@oneRandomQuote');
    $router->get('/quotes/{id}', 'QuoteController@listQuote');

    $router->get('/categories', 'CategoryController@listCategories');
    $router->get('/categories/{category}/quotes', 'CategoryController@listQuotesByCategory');
    $router->post('/categories/create', 'CategoryController@createCategory');
    $router->get('/categories/{id}/delete', 'CategoryController@deleteCategory');


    $router->get('/authors', 'AuthorController@listAuthors');
    $router->get('/authors/{id}/quotes', 'AuthorController@listQuotesByAuthor');
    $router->post('/authors/create', 'AuthorController@createAuthor');
    $router->get('/authors/{id}/delete', 'AuthorController@deleteCategory');
});
