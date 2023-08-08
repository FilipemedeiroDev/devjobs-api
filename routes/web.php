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

$router->get('/jobs', 'JobController@getAllJobs');
$router->get('/jobs/{id}', 'JobController@getJobById');
$router->post('/jobs', 'JobController@publishJob');

$router->get('users/{id}', 'UserController@getUserById');
$router->post('users', 'UserController@createUser');
