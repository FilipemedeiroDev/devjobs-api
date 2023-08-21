<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Route;


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



//$router->get('users/{id}', 'UserController@getUserById');
$router->post('/users', 'UserController@createUser');
$router->post('/login', 'UserController@login');

$router->get('/jobs', 'JobController@getAllJobs');
$router->get('/jobs/{id}', 'JobController@getJobById');

Route::group(['middleware' => 'auth:api'], function ($router) {

    $router->get('/me', 'UserController@me');

    $router->get('/companies', 'CompanyController@findAllByUserId');
    $router->get('/companies/{id}', 'CompanyController@findById');
    $router->post('/companies', 'CompanyController@createCompany');
    $router->put('/companies/{id}', 'CompanyController@updateCompany');
    $router->delete('/companies/{id}', 'CompanyController@deleteCompany');

    $router->post('/jobs', 'JobController@publishJob');
    $router->put('/jobs/{id}', 'JobController@updateJob');
    $router->delete('/jobs/{id}', 'JobController@deleteJob');

    $router->post('/submissions', 'SubmissionController@createSubmission');
    $router->get('/submissions', 'SubmissionController@getAllSubmissionByUserId');
});