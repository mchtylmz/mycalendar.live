<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->get('/', 'Home::index');


// Public Group
$routes->group('', function ($routes) {
    // Event Group
    $routes->group('event/(:any)/(:num)', function ($routes) {
        // get
    });
    // Guest User Profile
    $routes->get('my/(:any)', 'Account::profile/$1', ['as' => 'user.profile']);
    // Category Detail
    $routes->get('category/(:any)', 'Home::category/$1', ['as' => 'category']);
    // Contact
    $routes->get('users', 'Home::users', ['as' => 'users']);
    // Contact
    $routes->get('contact', 'Home::contact', ['as' => 'contact']);
});

// Auth Group
$routes->group('auth', ['filter' => 'guest', 'namespace' => 'App\Controllers\Auth'], function ($routes) {
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
});

// User Logged Group
$routes->group('', ['filter' => 'auth'], function ($routes) {
    // get
    $routes->get('calendar', 'Events::index', ['as' => 'my.calendar']);
    // post

    // Event Group
    $routes->group('event', function ($routes) {
        // get
        $routes->get('new', 'Events::new', ['as' => 'event.new']);
        $routes->get('edit/(:num)', 'Events::edit/$1', ['as' => 'event.edit']);
        $routes->get('remove/(:num)', 'Events::remove/$1', ['as' => 'event.remove']);
        // post
        $routes->post('new', 'Events::store');
        $routes->post('edit/(:num)', 'Events::store/$1');
    });

    // Account Group
    $routes->group('account', function ($routes) {
        // get
        $routes->get('change-password', 'Account::changePassword', ['as' => 'account.changePassword']);
        $routes->get('update-profile', 'Account::updateProfile', ['as' => 'account.updateProfile']);
        $routes->get('logout', 'Account::logout', ['as' => 'account.logout']);
        // post
        $routes->post('update-profile', 'Account::updateProfilePost', ['as' => 'account.updateProfile']);
        $routes->post('change-password', 'Account::changePasswordPost', ['as' => 'account.changePassword']);
    });
});

// Admin Logged Group
$routes->group(site_setting('admin_url'), ['filter' => 'admin', 'namespace' => 'App\Controllers\Admin'], function ($routes) {
    // get
    $routes->get('', 'Admin::index', ['as' => 'admin']);
    $routes->get('users', 'Users::index', ['as' => 'admin.users']);
    $routes->get('events', 'Events::index', ['as' => 'admin.events']);
    $routes->get('settings', 'Settings::index', ['as' => 'admin.settings']);
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
