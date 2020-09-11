<?php

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

/* $router->get('/preguntas', 'preguntaController@index');
$router->put('/preguntas/{idpregunta}', 'preguntaController@update');
$router->get('/preguntas/{idpregunta}', 'preguntaController@edit'); */
$router->get('/users', 'UsuarioController@index');
$router->get('/users/{id}', 'UsuarioController@show');
$router->post('/users', 'UsuarioController@store');
$router->put('/users/{id}', 'UsuarioController@update');
$router->delete('/users/{id}', 'UsuarioController@destroy');

