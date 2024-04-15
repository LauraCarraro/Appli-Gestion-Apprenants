
let connexionButton = document.getElementById("connexionButton");
let body = document.getElementById("body");

let inputEmail = document.getElementById("email");
let inputMotDePasse = document.getElementById("motdepasse");

if (connexionButton) {
  connexionButton.addEventListener("click", sendConnexionForm);
}

function sendConnexionForm(event) {
  event.preventDefault();

  let inputEmail = inputEmail.value;
  let inputMotDePasse = inputMotDePasse.value;

  let url = "/";
  let user = {
    email: inputEmail,
    motdepasse: inputMotDePasse,
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
