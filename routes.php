<?php
$router->get('/', 'HomeController@index');
// $router->get('/listings', 'ListingController@index');
// $router->get('/listings/create', 'ListingController@create');
// $router->get('/listing/{id}', 'ListingController@show');
$router->get('/auth/register', 'UserController@create', ['guest']);
$router->get('/auth/login', 'UserController@login', ['guest']);

$router->post('/auth/register', 'UserController@store', ['guest']);
$router->post('/auth/logout', 'UserController@logout', ['auth']);
$router->post('/auth/login', 'UserController@authenticate', ['guest']);
