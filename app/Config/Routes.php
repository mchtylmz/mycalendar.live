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
$routes->setDefaultController('Auth');
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
$routes->get('/', 'Auth::index');

// Auth Group
$routes->group('auth', function($routes) {
	// GET
	$routes->get('login', 'Auth::login', ['as' => 'login']);
	$routes->get('register', 'Auth::register', ['as' => 'register']);
	$routes->get('forgot-password', 'Auth::forgotPassword', ['as' => 'forgot.password']);
	$routes->get('reset-password/(:alphanum)', 'Auth::resetPassword/$1', ['as' => 'reset.password']);
	$routes->get('logout', 'Auth::logout', ['as' => 'logout']);
	// POST
	$routes->post('login', 'Auth::loginPost');
	$routes->post('register', 'Auth::registerPost');
	$routes->post('forgot-password', 'Auth::forgotPasswordPost');
	$routes->post('reset-password/(:alphanum)', 'Auth::resetPasswordPost/$1');
});

// Panel Group
$routes->group('', ['filter' => 'auth'], function($routes) {
	// user panel
	// get
	$routes->get('calendar', 'Home::index', ['as' => 'my_calendar']);
	// post
});

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
