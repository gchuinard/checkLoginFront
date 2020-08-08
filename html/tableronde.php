<?php

// comme d'hab, on a besoin de $_SESSION, on lance session_start()
// si on a pas besoin de $_SESSION, on peut quand même lancer session_start(), ça coûte pas grand chose
session_start();

// ici, on vérifie 2 facteurs de redirection
// 1. le visiteur n'est pas connecté
// 2. le visiteur est connecté mais n'est pas un chevalier
if (!isset($_SESSION['user'])
|| $_SESSION['user']['data']['role'] != 'Chevalier') {
    header('Location: index.php');
    exit;
}

echo 'Seuls les chevaliers sont acceptés autour de la Table Ronde';