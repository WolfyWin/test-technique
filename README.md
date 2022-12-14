# Test technique

# Frontend :

    ○ Une case de texte dans laquelle l'utilisateur va entrer un nombre 
    ○ Un bouton qui, lorsque cliqué, envoie le nombre entré par l'utilisateur au serveur qui va stocker ce nombre dans une liste de nombres
    ○ L'affichage dynamique de la liste de nombres stockée sur le serveur, mais triée par ordre croissant, ce tri devra être effectué côté serveur
    ○ Un peu de css pour rendre l'ensemble propre, compréhensible et utilisable

# Backend :

    ○ Disposer d'une base de données pouvant contenir une liste de nombres
    ○ Construire une API, toute interaction avec la base de données devra passer par cette API
    ○ Le tri de la liste de nombres devra se faire côté serveur


# Explications Backend :

    ○ Le backend à été réalisé sous Symfony 6 avec une base de données MySQL
    ○ Une entité number a été créée avec un champ id et un champ value pour stocker les nombres en BDD
    ○ Une API a été créée avec un controller NumberController et une route /numbers
    ○ Une route GET /numbers permet de récupérer la liste des nombres triés par ordre croissant
    ○ Une route POST /numbers permet d'ajouter un nombre à la liste
    ○ Les deux routes retournent les nombres au format JSON pour être utilisés par le frontend
    ○ Une migration a été créée pour créer la table number dans la BDD
    
# Explications Frontend :

    ○ Le frontend à été réalisé en HTML, CSS et JavaScript
    ○ Le style a été réalisé avec Bootstrap 5 et le thème Bootswatch slate
    ○ Une page index.html a été créée pour afficher la liste des nombres et le formulaire d'ajout
    ○ Un fichier app.js a été créé pour gérer les interactions avec l'API
    ○ La liste des nombres est récupérée depuis l'API au chargement de la page
    ○ La requête d'ajout d'un nombre est envoyé à l'API à l'envoi du formulaire grâce à la méthode fetch
    ○ La liste des nombres est mise à jour entièrement après l'ajout d'un nombre grâce au DOM
    ○ Le tri des nombres est effectué côté serveur

