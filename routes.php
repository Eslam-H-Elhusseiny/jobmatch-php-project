<?php

$router->get('/', 'HomeController@index');
$router->get('/about', 'HomeController@about');

$router->get('/auth/user/register', 'UserController@create', ['guest']);
$router->get('/auth/organization/register', 'OrganizationController@create', ['guest']);
$router->get('/auth/user/login', 'UserController@login', ['guest']);
$router->get('/auth/organization/login', 'OrganizationController@login', ['guest']);

$router->post('/auth/user/register', 'UserController@store', ['guest']);
$router->post('/auth/organization/register', 'OrganizationController@store', ['guest']);
$router->post('/auth/logout', 'UserController@logout', ['auth']);
$router->post('/auth/user/login', 'UserController@authenticate', ['guest']);
$router->post('/auth/organization/login', 'OrganizationController@authenticate', ['guest']);

$router->get('/auth/user/profile', 'UserController@profile', ['auth']);
$router->get('/auth/organization/profile', 'OrganizationController@profile', ['auth']);
$router->get('/organizations/info/{id}', 'OrganizationController@info');

$router->get('/create/job', 'JobsController@create', ['auth']);
$router->post('/jobs', 'JobsController@store');

$router->get('/jobs', 'JobsController@index');
$router->get('/jobs/search', 'JobsController@index');
$router->get('/jobs/{id}', 'JobsController@show');
$router->post('/jobs/status', 'JobsController@status');
$router->get('/jobs/{id}/list', 'JobsController@list');
// $router->get('/jobs/{id}/applicants', 'JobsController@jobApplicants');

$router->post('/jobs/apply', 'JobsController@application');
$router->get('/jobs/{id}/apply', 'JobsController@apply');


// return jobs posted by an organization
$router->get('/org/jobs', 'JobsController@jobOrganization');


// return jobs applied by the user ( filter by application status)
$router->get('/user/{id}/jobs', 'JobsController@appliedJobs');
