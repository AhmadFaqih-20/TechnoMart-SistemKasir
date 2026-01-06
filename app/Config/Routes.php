<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('customers', 'CustomerController::index');
$routes->get('customers/create', 'CustomerController::create');
$routes->post('customers/insert', 'CustomerController::insert');
$routes->get('customers/edit/(:num)', 'CustomerController::edit/$1');
$routes->post('customers/update/(:num)', 'CustomerController::update/$1');
$routes->get('customers/delete/(:num)', 'CustomerController::delete/$1');

$routes->get('categories', 'CategoryController::index');
$routes->get('categories/create', 'CategoryController::create');
$routes->post('categories/insert', 'CategoryController::insert');
$routes->get('categories/edit/(:num)', 'CategoryController::edit/$1');
$routes->post('categories/update/(:num)', 'CategoryController::update/$1');
$routes->get('categories/delete/(:num)', 'CategoryController::delete/$1');

$routes->get('employees', 'EmployeeController::index');
$routes->get('employees/create', 'EmployeeController::create');
$routes->post('employees/insert', 'EmployeeController::insert');
$routes->get('employees/edit/(:num)', 'EmployeeController::edit/$1');
$routes->post('employees/update/(:num)', 'EmployeeController::update/$1');
$routes->get('employees/delete/(:num)', 'EmployeeController::delete/$1');

$routes->get('products', 'ProductController::index');
$routes->get('products/create', 'ProductController::create');
$routes->post('products/insert', 'ProductController::insert');
$routes->get('products/edit/(:num)', 'ProductController::edit/$1');
$routes->post('products/update/(:num)', 'ProductController::update/$1');
$routes->get('products/delete/(:num)', 'ProductController::delete/$1');
