<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Accueil', 'Visiteur::Accueil');
$routes->get('seconnecter', 'Visiteur::SeConnecter');
$routes->match(['get','post'],'creeuncompte', 'Visiteur::CréationCompte');