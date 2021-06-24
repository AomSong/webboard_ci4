<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Index::index');
$routes->get('index_view/(:num)', 'Index::index_view/$1');
$routes->get('index_list/(:any)', 'Index::index_list/$1');

$routes->get('login', 'User::login');
$routes->post('login_db', 'User::login_db', ['filter' => 'noauth']);

$routes->get('register', 'User::register');
$routes->post('register_db', 'User::register_db');

$routes->get('mainpage', 'Mainpage::index', ['filter' => 'auth']);
$routes->get('mainpage_view/(:num)', 'Mainpage::mainpage_view/$1', ['filter' => 'auth']);
$routes->get('mainpage_list/(:any)', 'Mainpage::mainpage_list/$1', ['filter' => 'auth']);
$routes->post('comment_add_db', 'Mainpage::comment_add_db');

$routes->get('profile', 'Profile::profile', ['filter' => 'auth']);


$routes->post('image_edil_db', 'Profile::image_edil_db');

$routes->post('user_edit_db', 'Profile::user_edit_db');


$routes->post('password_edit_db', 'Profile::password_edit_db');

$routes->post('webboard_add_db', 'Webboard::webboard_add_db');

$routes->get('webboard_list', 'Webboard::webboard_list', ['filter' => 'auth']);

$routes->post('webboard_edil_db', 'Profile::webboard_edil_db');
$routes->get('webboard_delete/(:num)', 'Profile::webboard_delete/$1');

$routes->get('logout', 'User::logout');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
