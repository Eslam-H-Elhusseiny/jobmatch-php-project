<?php

/**
 * Home Route
 */

$router->get('/', 'HomeController@index');

/**
 * Jobs Routes
 */

$router->get('/jobs', 'JobsController@index');
$router->get('/jobs/{id}', 'JobsController@show');
// $router->get('/jobs/create', 'JobsController@create');
// $router->get('/jobs/edit/{id}', 'JobsController@edit');


/**
 * User Routes
 */


// $router->get('/profile', 'OrganizationController@index');

$router->get('/user/{id}/jobs', 'JobsController@appliedJobs');
