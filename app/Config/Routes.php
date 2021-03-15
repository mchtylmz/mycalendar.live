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
$routes->get('/', 'Auth\Auth::index');

// Auth Group
$routes->group('auth', ['filter' => 'guest', 'namespace' => 'App\Controllers\Auth'], function($routes) {
	// GET
	$routes->get('', 'Auth::index', ['as' => 'auth.index']);
	$routes->get('login', 'Login::index', ['as' => 'auth.login']);
	$routes->get('register', 'Register::index', ['as' => 'auth.register']);
	$routes->get('forgot-password', 'ForgotPassword::index', ['as' => 'auth.forgotpassword']);
	$routes->get('reset-password/(:alphanum)', 'ResetPassword::get/$1', ['as' => 'auth.resetpassword']);

	// POST
	$routes->post('login', 'Login::post');
	$routes->post('register', 'Register::post');
	$routes->post('forgot-password', 'ForgotPassword::post');
	$routes->post('reset-password/(:alphanum)', 'ResetPassword::post/$1');

	// MATCH
	$routes->match(['get', 'post'], 'logout', 'Auth::logout', ['as' => 'auth.logout']);
});

// Panel Group
$routes->group('', ['filter' => 'auth'], function($routes) {
	// user panel
	// get
	$routes->get('calendar', 'Home::index', ['as' => 'my.calendar']);
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
