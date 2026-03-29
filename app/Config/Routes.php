<?php namespace Config;

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
$routes->setDefaultController('Home'); // remettre Home
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
$routes->get('test', 'TestController::index');
$routes->get('noface1', 'TestController::index');
$routes->get('noface2', 'CeviController::index');
$routes->get('noface3', 'ViceController::index');
$routes->get('noface4', 'TesttController::index');

$routes->get('offre2', 'OffreController2::index');
$routes->get('offre1', 'OffreController::index');
$routes->get('offre3', 'OffreController3::index');


/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Route par défaut : page de connexion
$routes->get('/', 'Connexion::index');

// Routes de connexion
$routes->get('Connexion', 'Connexion::index'); // Affiche le formulaire de connexion
$routes->post('Connexion/login', 'Connexion::login'); // Traitement de connexion

// Déconnexion
$routes->get('logout', 'Connexion::deconnexion');

// Page d'accueil après connexion
$routes->get('Home', 'Home::index'); 

// Routes d'inscription
$routes->get('CreateUser', 'CreateUser::index'); // Affiche le formulaire d'inscription
$routes->post('CreateUser/register', 'CreateUser::register'); // Traite l'inscription
$routes->get('register', 'CreateUser::index'); // Alias pour le formulaire
$routes->post('register', 'CreateUser::register'); // Alias pour l'inscription

// Autres routes
$routes->get('/PageUser', 'PageUser::index'); // Assure-toi que cette ligne existe !
$routes->post('/PageUser', 'PageUser::index'); // Si la page reçoit des requêtes POST
$routes->get('BookForm', 'FormController::BookForm');

$routes->get('/Offre', 'Offre::index');
$routes->get('/Offre/offre2', 'Offre::offre2'); // Changez POST en GET
$routes->get('/Offre/offre3', 'Offre::offre3'); // Ajoutez la route pour offre3
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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
