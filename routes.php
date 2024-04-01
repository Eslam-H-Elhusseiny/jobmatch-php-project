<?php
$router->get('/', 'HomeController@index');
// $router->get('/listings', 'ListingController@index');
// $router->get('/listings/create', 'ListingController@create');
// $router->get('/listing/{id}', 'ListingController@show');
$router->get('/auth/user/register', 'UserController@create', ['guest']);
$router->get('/auth/organization/register', 'OrganizationController@create', ['guest']);
$router->get('/auth/user/login', 'UserController@login', ['guest']);
$router->get('/auth/organization/login', 'OrganizationController@login', ['guest']);

$router->post('/auth/user/register', 'UserController@store', ['guest']);
$router->post('/auth/organization/register', 'OrganizationController@store', ['guest']);
$router->post('/auth/logout', 'UserController@logout', ['auth']);
$router->post('/auth/user/login', 'UserController@authenticate', ['guest']);
$router->post('/auth/organization/login', 'OrganizationController@authenticate', ['guest']);
