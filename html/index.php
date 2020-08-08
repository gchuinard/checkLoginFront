<?php

  session_start();

  // vérifier si le formulaire est envoyé ou pas
  if (isset($_POST['username']) && isset($_POST['password'])) {
    // importer notre source de données
    require '../inc/users.php';
    // vérifier s'il existe un utilisateur correspondant au nom saisi
    if (isset($users[$_POST['username']])) {
      // je sauvegarde les données de l'utilisateur dans une variable au nom plus court
      $user = $users[$_POST['username']];
      // vérifier le mot de passe
      // et maintenant que nos mots de passe sont hachés, il faut utiliser la fonction password_verify pour les comparer
      // attention à l'ordre des arguments !
      // le premier argument est le mot de passe en clair saisi par l'utilisateur
      // le deuxième est le mot de passe hashé sauvegardé dans votre source de données
      if (password_verify($_POST['password'], $user['pass'])) {
        // safe zone
        // enregistrer l'utilisateur en session
        
        // l'opérateur + utilisé avec 2 tableaux cumule les entrées des 2 tableaux en un seul tableau résultant
        // attention, si des clés présentes dans le tableau de gauche sont aussi présentes dans le tableau de droite, les valeurs de droite seront conservées
        $_SESSION['user'] = $user + ['name' => $_POST['username']];
        
        //$user['name'] = $_POST['username'];
        //$_SESSION['user'] = $user;

        //$_SESSION['user'] = $user;
        //$_SESSION['user']['name'] = $_POST['username'];

        // tout est bon, on peut maintenant aller sur l'accueil connecté
        header('Location: home.php');
        exit;

      }
    }
  }

  if (isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme'];
  } else {
    $theme = 'light'; // notre thème par défaut
  }
  // ici, $theme est forcément définie et peut avoir 3 valeurs différentes :
  // - 'light' si le cookie 'theme' n'existe pas
  // - 'dark' si le cookie 'theme' existe et qu'il contient 'dark'
  // - n'importe quoi d'autre si le cookie 'theme' existe et qu'il contient n'importe quoi d'autre

  require '../templates/header.php';
  require '../templates/login.php';
  require '../templates/footer.php';