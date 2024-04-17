<?php

namespace src\Repositories;

include_once __DIR__ . '/includes/header.php';


$promoRepository = new PromoRepository();
$promotions = $promoRepository->getAllPromotions();

?>



    <div class="m-2" id="bodyDashboard"></div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Accueil</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Promotions</button>
      </li>

    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



        <div class="card-body">
          <h5 class="card-title d-flex justify-content-start">Cours du jour</h5>
          <div class="card-text mb-3 bg-light position-relative">
            <p class="card-text d-flex justify-content-start">DWWM3 - matin</p>
            <p class="card-text d-flex justify-content-start">15 participants</p>
            <p class="card-text d-flex justify-content-end position-absolute top-0 end-0"><?php echo date('d-m-Y'); ?></p>

            <div class="d-flex justify-content-end">

              <button id="" class="btn btn-primary">Valider présence</button>
            </div>
          </div>
          <div class="card-text mb-3 bg-light position-relative">
            <p class="card-text d-flex justify-content-start">DWWM3 - après midi</p>
            <p class="card-text d-flex justify-content-start">15 participants</p>
            <p class="card-text d-flex justify-content-end position-absolute top-0 end-0"><?php echo date('d-m-Y'); ?></p>
            <div class="d-flex justify-content-end">
              <button id="btnSignatures" class="btn btn-success">Signatures recueillies</button>
            </div>
          </div>
        </div>

      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        <div id="contentPromotion">


          <div class="d-flex justify-content-between my-3 mx-2">
            <div>
              <h3>Promotions</h3>
            </div>
            <button id="ajouterPromotion" class="btn btn-success">Ajouter une promotion</button>


          </div>
          <p class="my-3 mx-2">Promos 2024</p>

          <table class="table  my-3 mx-2">
            <thead>
              <tr>
              <th class="d-none" scope="col">IDPromo</th>
                <th scope="col">Promotions</th>
                <th scope="col">Date début</th>
                <th scope="col">Date fin</th>
                <th scope="col">Nombre élèves</th>
                <!-- <th scope="col">Actions</th> -->
              </tr>
            </thead>
            <tbody>
              <?php foreach ($promotions as $promo) : ?>
                <tr>
                  <td class="d-none" ><?php echo $promo->getId(); ?></td>
                  <td><?php echo $promo->getNom(); ?></td>
                  <td><?php echo $promo->getDateDebut(); ?></td>
                  <td><?php echo $promo->getDateFin(); ?></td>
                  <td><?php echo $promo->getNombreApprenants(); ?></td>
                  <td>
                    <button type="button" class="btn btn-link">Voir</button>
                    <button type="button" class="btn btn-link">Editer</button>
                    <button type="button" class="btn btn-link">Supprimer</button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>


        </div>
      </div>

    </div>









