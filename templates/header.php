<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>oLogin</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="<?=$theme?>">
  <div id="app">
    <header id="header">
      <h1 id="app-title"><a href="#">oLogin</a></h1>
      <nav id="nav">
        <a href="./">Accueil</a>
        <a href="#">Profil</a>
        <a href="#">À propos</a>
        <a href="#">FAQ</a>
        <a href="#">Contact</a>
        <form action="theme-switcher.php" method="POST">
          <select name="theme" id="theme-switcher">
            <option value="light">Thème clair</option>
            <option value="dark" <?php if ($theme == "dark"): ?>selected<?php endif; ?>>Thème sombre</option>
          </select>
        </form>
      </nav>
    </header>