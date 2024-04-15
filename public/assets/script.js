let connexionButton = document.getElementById("connexionButton");
let body = document.getElementById("body");

let inputEmail = document.getElementById("email");
let inputMotDePasse = document.getElementById("motdepasse");

if (connexionButton) {
  connexionButton.addEventListener("click", sendConnexionForm);
}

function sendConnexionForm(event) {
  event.preventDefault();

  let email = inputEmail.value;
  let motdepasse = inputMotDePasse.value;

  let url = "/";
  let user = {
    email: email,
    motdepasse: motdepasse,
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
    });
};
