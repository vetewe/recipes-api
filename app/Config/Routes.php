<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->setAutoRoute(true);
$routes->get('/', 'Resep::index');
$routes->get('/resep/preview/(:any)', 'Resep::preview/$1');

$routes->resource('recipesapi');
