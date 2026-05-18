<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

////////////////////// UC 1 ///////////////////////////
$routes->get('Accueil', 'Visiteur::Accueil');

////////////////////// UC 2 ///////////////////////////
$routes->match(['get','post'],'creeuncompte', 'Visiteur::CréationCompte');

////////////////////// UC 3 ///////////////////////////
$routes->get('voirliaison', 'Visiteur::voirLiaison');

////////////////////// UC 4 ///////////////////////////
$routes->get('voirtarif/(:num)', 'Visiteur::voirTarif/$1');

////////////////////// UC 5 ///////////////////////////
$routes->get('voirhorairestraversees', 'Visiteur::voirHoraires');
$routes->match(['get','post'], '/AfficheHTNumSect/(:num)', 'Visiteur::voirHorairesNumSect/$1');

////////////////////// UC 6 ///////////////////////////
$routes->match(['get','post'],'seconnecter', 'Visiteur::SeConnecter');
$routes->match(['get','post'], 'sedeconnecter', 'Visiteur::seDeconnecter');

////////////////////// UC 7 ///////////////////////////
$routes->match(['get','post'], '/Reservetraversee/(:num)', 'visiteur::voirReservetrav/$1');

////////////////////// UC 8 ///////////////////////////
$routes->match(['get','post'], 'compterendu', 'Visiteur::voirCompteRendu');