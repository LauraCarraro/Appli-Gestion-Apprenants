import * as serviceNavDec from "./dashboard.js";

let connexionButton = document.getElementById("connexionButton");
let body = document.getElementById("body");

let email = document.getElementById("email");
let motdepasse = document.getElementById("motdepasse");

if (connexionButton) {
  connexionButton.addEventListener("click", sendConnexionForm);
}

function sendConnexionForm(event) {
  event.preventDefault();

  let emailValue = email.value;
  let motdepasseValue = motdepasse.value;

  let url = "/";
  let user = {
    email: emailValue,
    motdepasse: motdepasseValue,
  };

  fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(user),
  })
    .then((response) => {
      return response.text();
    })
    .then((result) => {
      body.innerHTML = "";
      body.innerHTML = result;
      serviceNavDec.deconnexion();
      serviceNavDec.displayFormPromotion();
      serviceNavDec.displayThisPromo()
      
    });
};
