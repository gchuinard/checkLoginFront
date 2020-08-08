<?php

session_start();
// filtrer pour ne laisser qu'un utilisateur connecté
// sinon => index.php
// un utilisateur connecté a un élément "user" dans son array de session

// si l'élément "user" existe, on ne fait rien, on doit simplement continuer l'exécution normale de la page
// par contre, s'il n'existe pas ...
if (!isset($_SESSION['user'])) {
    // ... on redirige l'utilisateur vers la page d'accueil
    header('Location: index.php');
    // et on interrompt le script (pas la peine de lire la suite, de toute façon le client va se rediriger vers index.php)
    exit;
}

// cet entête indique via HTTP à mon client que ma réponse sera au format texte simple (et encodé en UTF8), plutôt qu'en HTML, le format attendu par défaut par tous les navigateurs
/*header('Content-type: text/plain; charset=utf8');
var_dump($_SESSION['user']);
exit;*/

$user = $_SESSION['user'];

// repris d'index.php => sert à déterminer le thème à utiliser
if (isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme'];
} else {
    $theme = 'light'; // notre thème par défaut
}

require '../templates/header.php';
require '../templates/home-connected.php';
require '../templates/footer.php';