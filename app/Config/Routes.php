<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/new-complaint', 'ComplaintController::index');
$routes->post('api/create-complaint', 'ComplaintController::submitComplaint');
$routes->post('api/upload-files/(:num)', 'ComplaintController::submitFiles/$1');
$routes->get('/register', 'ComplaintController::register');
$routes->post('/api/create-user', 'ComplaintController::createUser');
$routes->get('/follow', 'FollowController::index');
$routes->post('api/login', 'FollowController::login');
$routes->get('user/(:segment)', 'FollowController::user/$1');