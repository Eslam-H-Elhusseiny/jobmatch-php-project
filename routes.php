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
$router->get('/job', 'JobsController@show');


/**
 * User Routes
 */


// $router->get('/profile', 'OrganizationController@index');

