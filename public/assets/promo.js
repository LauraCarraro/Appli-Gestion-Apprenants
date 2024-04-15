import * as servicePromo from "./dashboard.js";

export function retourVersTousLesPromo() {
  const btnRetourVersTousLesPromo = document.getElementById(
    "btnRetourVersTousLesPromo"
  );
  const body = document.body;

  btnRetourVersTousLesPromo.addEventListener("click", () => {
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
        servicePromo.displayFormPromotion();
        servicePromo.deconnexion();
        servicePromo.createNewPromo();
        servicePromo.displayThisPromo
        retourVersTousLesPromo1();
      })
      .catch((error) => {
        console.error("There was a problem with the fetch operation:", error);
      });
  });
}

export function retourVersTousLesPromo1() {
  const btnRetourVersTousLesPromo1 = document.getElementById(
    "btnRetourVersTousLesPromo1"
  );
  const body = document.body;

  btnRetourVersTousLesPromo1.addEventListener("click", () => {
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
        servicePromo.displayFormPromotion();
        servicePromo.deconnexion();
        servicePromo.createNewPromo();
        servicePromo.displayThisPromo
        retourVersTousLesPromo()
      })
      .catch((error) => {
        console.error("There was a problem with the fetch operation:", error);
      });
  });
}