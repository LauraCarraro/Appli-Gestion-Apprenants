<?php

namespace src\Controllers;

use src\Services\Reponse;

class HomeController
{

  use Reponse;

  public function index(): void
  {
    include_once __DIR__ . '/../Views/connexion.php';
  }




  public function authAdmin()
  {
    $request = file_get_contents('php://input');

    if ($request) {
      $decodedRequest = json_decode($request);

      if ($decodedRequest) {
        $email = htmlspecialchars($decodedRequest->email);
        $password = htmlspecialchars($decodedRequest->password);
        if ($email === 'admin@admin.admin' && $password === 'admin') {
          $_SESSION['connecté'] = true;
          $_SESSION['role'] = 'admin';

          include_once __DIR__ . '/../Views/dashboard.php';
        } else {
          exit();
        }
      } else {
        header('Location: ' . HOME_URL . '?erreur=connexion');
        exit();
      }
    } else {
      header('Location: ' . HOME_URL . '?erreur=connexion');
      exit();
    }
  }

  public function displayFormAjouterPromotion()
  {
    include_once __DIR__ . '/../Views/ajouterPromotion.php';
  }

  public function displayDashboard()
  {
    include_once __DIR__ . '/../Views/dashboard.php';
  }

  public function displayThisPromo()
  {
    include_once __DIR__ . '/../Views/displayThisPromo.php';
  }

  public function quit()
  {
    session_destroy();
    $_SESSION['connecté'] = false;
    include_once __DIR__ . '/../Views/connexion.php';
  }

  public function page404(): void
  {
    header("HTTP/1.1 404 Not Found");
    $this->render('404');
  }
}