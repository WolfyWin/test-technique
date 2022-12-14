
// on récupère le formulaire et on lui ajoute un écouteur d'événement submit
let form = document.getElementById("form");

// on ajoute un écouteur d'événement submit au formulaire
form.addEventListener("submit", event => {
    // on empêche le formulaire de se soumettre pour éviter un rechargement de la page
    event.preventDefault();

    // on récupère le champ
    let input = document.getElementById("number");

    // on récupère la valeur du champ
    let inputValue = input.value;

    // on affiche la valeur dans la console
    console.log(inputValue);

    // envoi d'une requête AJAX en POST au serveur avec fetch
    fetch("https://127.0.0.1:8000/number", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "value=" + inputValue
    })
    .then(response => response.json())
    .then(data => {
        // on affiche la réponse du serveur dans la console
        // la réponse est un tableau contenant tout les nombres de la base de données
        console.log(data);

        // on affiche la réponse du serveur dans la page sous forme d'une liste non ordonnée
        let ul = document.getElementById("list");

        // on vide la liste
        ul.innerHTML = "";

        // on ajoute chaque élément du tableau dans la liste avec une boucle for of
        for( let number of data )
        {
            let li = document.createElement("li");
            li.textContent = number;
            ul.appendChild(li);
        }

        // on vide le champ une fois que tout est fini
        input.value = "";
    });
});

// on soumet une première fois le formulaire vide pour afficher la liste des nombres
// pour ça on "simule" la soumission du formulaire avec un événement
form.dispatchEvent( new Event("submit") );