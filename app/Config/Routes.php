<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Accueil', 'Visiteur::Accueil');
$routes->match(['get','post'],'seconnecter', 'Visiteur::SeConnecter');
$routes->match(['get','post'], 'sedeconnecter', 'Visiteur::seDeconnecter');
$routes->match(['get','post'],'creeuncompte', 'Visiteur::CréationCompte');
$routes->get('voirliaison', 'Visiteur::voirLiaison');
$routes->get('voirtarif/(:num)', 'Visiteur::voirTarif/$1');
$routes->get('voirhorairestraversees', 'Visiteur::voirHoraires');
$routes->match(['get','post'], 'AfficheHTNumSect/(:num)', 'Visiteur::voirHorairesNumSect/$1');