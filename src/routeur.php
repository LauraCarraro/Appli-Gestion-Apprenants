<?php

use src\Controllers\HomeController;
use src\Controllers\PromoController;
use src\Services\Routing;

$HomeController = new HomeController;
$PromoController = new PromoController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];
$routeComposee = Routing::routeComposee($route);

switch ($route) {
  case HOME_URL:
    //Vérifier si connecté, si c'est le cas rediriger
    if (isset($_SESSION['connecté']) && $_SESSION['connecté'] === true) {
      header('Location: ' . HOME_URL . 'dashboard');
      $HomeController->displayDashboard();
    }

    if ($methode == 'POST') {
      $HomeController->authAdmin();
    } else {
      $HomeController->index();
    }
    break;

  case HOME_URL . 'dashboard':
    $HomeController->displayDashboard();
    
    break;

  case HOME_URL . 'ajouterPromotion':

    if ($methode == 'POST') {
      $PromoController->createPromo();
    } elseif ($methode == 'GET') {
      $HomeController->displayFormAjouterPromotion();
    }
    break;

  case HOME_URL . 'displayThisPromo':
    $HomeController->displayThisPromo();

    break;



  case HOME_URL . 'deconnexion':
    $HomeController->quit();
    break;


  default:
    $HomeController->page404();
    break;
}