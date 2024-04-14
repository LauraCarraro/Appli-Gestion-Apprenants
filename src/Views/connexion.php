<div id="connexionPageContent">
 

<?php
  include_once __DIR__ . '/includes/header.php';


  ?>
  <div id="error_message">
    <?php
    if (isset($_SESSION['error_message'])) {
      echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
      unset($_SESSION['error_message']);
    } ?>
  </div>

  <div class="container bg-light p-4  col-md-4 mt-5 shadow-lg p-3 mb-5">
    <form id="formConnexion" method="post" action="/dashboard" class="d-flex flex-column mb-3">
      <div class="text-center">
        <h2>Bienvenue</h2>
        <br>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email*</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Entrez votre e-mail" required>
      </div>
      <div class="mb-3">
        <label for="motdepasse" class="form-label">Mot de passe*</label>
        <input type="password" name="motdepasse" class="form-control" id="motdepasse" placeholder="Entrez votre mot de passe" required>
      </div>
      <div id="alertMessage" class="bg-danger text-white mb-3"></div>

      <div class="text-center">
      <div style="width: 60%; margin: 0 auto;">
        <button type="submit" id="connexionButton" class="btn btn-primary">Connexion</button>
      </div>
    </form>
  </div>


</div>