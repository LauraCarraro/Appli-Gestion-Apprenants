<?php

namespace src\Controllers;

use src\Repositories\PromoRepository;
use src\Services\Reponse;

class PromoController
{

  use Reponse;

  
  public function createPromo()
  {
      $request = file_get_contents('php://input');

      if ($request) {
          $decodedRequest = json_decode($request);

          if ($decodedRequest) {
              $Nom = htmlspecialchars($decodedRequest->Nom);
              $Date_debut = htmlspecialchars($decodedRequest->Date_debut);
              $Date_fin = htmlspecialchars($decodedRequest->Date_fin);
              $Nombre_apprenants = htmlspecialchars($decodedRequest->Nombre_apprenants);

              $promoRepository = new PromoRepository();
              $promoRepository->insertPromo($Nom, $Date_debut, $Date_fin, $Nombre_apprenants);

              include_once __DIR__ . '/../Views/dashboard.php';
          }
      }
  }

  }