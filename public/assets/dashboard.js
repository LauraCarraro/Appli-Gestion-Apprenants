let deco = document.getElementById("deconnexionBtn");
  console.log(deco);
  if (deco) {
    deco.addEventListener("click", deconnexion());
  }
  function deconnexion() {
    let body = document.body;
    let deconnexionBtn = document.getElementById("deconnexionBtn");
    console.log("hello");
    if (deconnexionBtn) {
      deconnexionBtn.addEventListener("click", () => {
        fetch("/deconnexion")
          .then((response) => {
            if (response.ok) {
              return response.text();
            } else {
              throw new Error("Logout failed");
            }
          })
          .then((result) => {
            body.innerHTML = result;
          })
          .catch((error) => {
            console.log("AJAX request failed: ", error);
          });
      });
    } else {
      console.error("deconnexionBtn not found in the DOM");
    }
  }

  let ajouterPromotion = document.getElementById("ajouterPromotion");
  
  if (ajouterPromotion) {
    ajouterPromotion.addEventListener("click", displayFormPromotion());
  }
function displayFormPromotion() {
    let contentPromotion = document.getElementById("contentPromotion");
    let ajouterPromotion = document.getElementById("ajouterPromotion");

    if (ajouterPromotion) {
      ajouterPromotion.addEventListener("click", () => {
        fetch("/ajouterPromotion")
          .then((response) => {
            if (!response.ok) {
              throw new Error("Network response was not ok");
            }
            return response.text();
          })
          .then((data) => {
            contentPromotion.innerHTML = data;
            createNewPromo();
            retourListePromo();
          })
          .catch((error) => {
            console.error("There was a problem with the fetch operation:", error);
          });
      });
    } else {
      console.error("ajouterPromotion button not found in the DOM");
    }
  }
  
 function createNewPromo() {
    let createNewPromoBtn = document.getElementById("createNewPromoBtn");
    let body = document.body;
  console.log(createNewPromoBtn);
    if (createNewPromoBtn) {
      createNewPromoBtn.addEventListener("click", (event) => {
        event.preventDefault();
  
        let inputNomPromo = document.getElementById("nomPromo");
        let inputDateDebut = document.getElementById("dateDebut");
        let inputDateFin = document.getElementById("dateFin");
        let inputNbApprenants = document.getElementById("nbApprenants");
        let inputNomPromoValue = inputNomPromo.value;
        let inputDateDebutValue = inputDateDebut.value;
        let inputDateFinValue = inputDateFin.value;
        let inputNbApprenantsValue = inputNbApprenants.value;
  
        let url = "/ajouterPromotion";
  
        let promo = {
          Nom: inputNomPromoValue,
          Date_debut: inputDateDebutValue,
          Date_fin: inputDateFinValue,
          Nombre_apprenants: inputNbApprenantsValue,
        };
  
        fetch(url, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(promo),
        })
          .then((response) => {
            return response.text();
          })
          .then((result) => {
            body.innerHTML = result;
          });
      });
    } else {
      console.error("createNewPromoBtn not found in the DOM");
    }
  }
  
  function displayThisPromo() {
    let displayThisPromoBtn = document.getElementById("displayThisPromoBtn");
    let body = document.body;
  
    if (displayThisPromoBtn) {
      displayThisPromoBtn.addEventListener("click", () => {
        fetch("/displayThisPromo")
          .then((response) => {
            if (!response.ok) {
              throw new Error("Network response was not ok");
            }
            return response.text();
          })
          .then((data) => {
            body.innerHTML = data;
          })
          .catch((error) => {
            console.error("There was a problem with the fetch operation:", error);
          });
      });
    } else {
      console.error("displayThisPromoBtn not found in the DOM");
    }
  }
  
  function retourListePromo() {
    let btnRetourListePromo = document.getElementById(
      "btnRetourListePromo"
    );
    let body = document.body;
  
    if (btnRetourListePromo) {
      btnRetourListePromo.addEventListener("click", () => {
        fetch("/dashboard")
          .then((response) => {
            if (!response.ok) {
              throw new Error("Network response was not ok");
            }
            return response.text();
          })
          .then((data) => {
            body.innerHTML = "";
            body.innerHTML = data;
            displayFormPromotion();
            deconnexion();
            displayThisPromo();
          })
          .catch((error) => {
            console.error("There was a problem with the fetch operation:", error);
          });
      });
    } else {
      console.error("btnRetourListePromo not found in the DOM");
    }
  }
  
  function retourListePromo() {
    let btnRetourListePromo = document.getElementById(
      "btnRetourListePromo"
    );
    let body = document.body;
  
    btnRetourListePromo.addEventListener("click", () => {
      fetch("/dashboard")
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.text();
        })
        .then((data) => {
          body.innerHTML = "";
          body.innerHTML = data;
          displayFormPromotion();
          deconnexion();
          createNewPromo();
          retourListePromo();
          displayThisPromo();
        })
        .catch((error) => {
          console.error("There was a problem with the fetch operation:", error);
        });
    });
  }