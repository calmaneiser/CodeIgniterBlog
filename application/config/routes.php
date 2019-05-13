<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route[''] <- bali eto yung alias = _______ <- eto yung sa controller

$route['posts/update'] = 'posts/update';
$route['posts/create'] = 'posts/edit';
$route['posts/create'] = 'posts/create';
$route['posts/delete'] = 'posts/delete';
$route['posts/(:any)'] = 'posts/view/$1'; //take controller
$route['posts'] = 'posts/index';

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/posts/(:any)'] = 'categories/posts/$1';




$route['default_controller'] = 'pages/index';
$route['(:any)'] = 'pages/index/$1'; //anything lang kase default na siya

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
 