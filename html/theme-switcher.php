<?php

$provenance = $_SERVER['HTTP_REFERER'];

// cette function informe Apache qu'il devra demander au client, lors de sa réponse HTTP, de créer un cookie nommé "thème" (1er argument) et ayant pour valeur ce que contient la donnée POST "theme" (2e argument)
setcookie('theme', $_POST['theme']);
// et une fois que c'est fait, on repart vers l'accueil
// version Louis : "tiens, prends ton cookie et dégage"
header("Location: $provenance");