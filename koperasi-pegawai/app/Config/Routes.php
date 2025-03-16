<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/customers', 'Customers::index');
$routes->get('/customers/create', 'Customers::create');
$routes->post('/customers/store', 'Customers::store');
$routes->get('/customers/edit/(:num)', 'Customers::edit/$1');
$routes->post('/customers/update', 'Customers::update');
$routes->get('/customers/delete/(:num)', 'Customers::delete/$1');

$routes->get('items', 'Items::index');
$routes->post('items/store', 'Items::store');
$routes->post('items/update', 'Items::update');
$routes->get('items/delete/(:num)', 'Items::delete/$1');



$routes->get('/sales', 'Sales::index');
