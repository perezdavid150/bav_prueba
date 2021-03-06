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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix'=>'api/v1'], function() use($router){
    // Productos
    $router->get('/producto', 'ProductosController@index');
    $router->post('/producto', 'ProductosController@create');
    $router->get('/producto/{id}', 'ProductosController@show');
    $router->put('/producto/{id}', 'ProductosController@update');
    $router->delete('/producto/{id}', 'ProductosController@delete');

    // Ventas
    $router->get('/venta', 'VentasController@index');
    $router->post('/venta', 'VentasController@create');
    $router->get('/venta/{id}', 'VentasController@show');
    $router->put('/venta/{id}', 'VentasController@update');
    $router->delete('/venta/{id}', 'VentasController@delete');
});