<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/new-complaint', 'ComplaintController::index');
$routes->post('api/create-complaint', 'ComplaintController::submitComplaint');
$routes->post('api/upload-files/(:num)', 'ComplaintController::submitFiles/$1');

$routes->get('/register', 'ComplaintController::register', ['filter' => 'form']);
$routes->post('/api/create-user', 'ComplaintController::createUser');
$routes->get('/follow', 'FollowController::index');
$routes->post('api/login', 'FollowController::login');
$routes->get('logout', 'FollowController::logout');
$routes->get('user/complaint', 'FollowController::user', ['filter' => 'auth']);
$routes->get('/login/123', 'AdminController::index');
$routes->post('api/admin-login', 'AdminController::login');

$routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('complaints', 'AdminController::admin');
    $routes->get('complaints/edit/(:segment)', 'AdminController::response/$1');
    $routes->get('logout', 'AdminController::logout');
});

$routes->post('api/admin/complaints/update/(:segment)', 'AdminController::setResponse/$1');