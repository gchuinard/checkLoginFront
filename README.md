# oLogin : Front

Il est temps de commencer à intéragir avec nos utilisateurs :tada:

On commence doucement avec un formulaire de connexion. Voici le résultat visé :

![Résultat](resultat.gif)

## Objectifs

1. Réaliser l'intégration
    - En respectant la charte proposée plus bas
    - Le code HTML est fourni :pray:
    - mais pas le code CSS :smiling_imp:
  
2. Mettre en place une validation des champs
    - Chaque champ doit contenir au moins 3 caractères pour être valide
    - Lorsque l'on change de champ, une classe doit être appliquée sur le champ (valide : bordure verte, invalide : bordure rouge)

3. À la soumission du formulaire
    - Chaque champ doit être validé
    - Si il y a des erreurs :
      - on empêche la soumission
      - on les affiche dans le formulaire
    - Si aucune erreur, on soumet le formulaire normalement

## Charte

### Fonts

IBM Plex Sans, avec les variantes :

- normal
- bold
- bold italic

### Couleurs

- Couleur de fond de page : blanc : #fff
- Couleur de fond de zone de contenu : gris très léger : #fafafa
- Couleur de fond du formulaire : gris léger : #f1f1f1
- Couleur des bordures : gris : #ccc
- Vert : #00d1b2
- Rouge/Rose : #ff3860
- Ombre portée : sur 20px => gris : #aaa
- Contenus : noir : #000
- Notes sous les champs : gris : #999

## Whaaaaat ???

### HTML / CSS

- `display: flex` est un allié précieux ([**mdn** flex](https://developer.mozilla.org/en-US/docs/Web/CSS/flex))
- [**mdn** box-shadow](https://developer.mozilla.org/en-US/docs/Web/CSS/box-shadow) peut aider pour la présentation du formulaire
- La gestion des couleurs pour les champs peut passer par l'usage d'une classe CSS

### JavaScript

- Pour travailler avec plusieurs champs, une boucle semble être un moyen idéal
- Stocker plusieurs erreurs pourrait passer par un tableau
- Écouter le changement de champ pourrait passer par [**mdn** blur](https://developer.mozilla.org/en-US/docs/Web/Events/blur)
- Pour empêcher la soumission d'un formulaire, [**mdn** preventDefault](https://developer.mozilla.org/en-US/docs/Web/API/Event/preventDefault) est nécessaire
- Pour sélectionner de multiples éléments du DOM, [**mdn** getElementsByClassName](https://developer.mozilla.org/en-US/docs/Web/API/Document/getElementsByClassName) ou [**mdn** querySelectorAll](https://developer.mozilla.org/en-US/docs/Web/API/Document/querySelectorAll) sont parfait
- [**mdn** innerHTML](https://developer.mozilla.org/en-US/docs/Web/API/Element/innerHTML) est pensé pour insérer du contenu HTML dans le DOM

## BONUS

### ... tout doux

Mettez en place un thème sombre avec un sélecteur dans la barre de navigation.  Au rafraîchissement de la page, on doit conserver le thème choisi.

Pistes :
- [ajouter une donnée dans un cookie](http://php.net/manual/fr/function.setcookie.php)
- [lire un cookie](http://php.net/manual/fr/reserved.variables.cookies.php)
- si on utilise les cookies, c'est pour que le serveur adapte son comportement en fonction de cette information : peut-être qu'il va falloir passer certains fichiers en `.php` :thinking:
- côté CSS, pensez à la façon la plus simple de procéder : évitez de modifier les classes un peu partout dans la page pour modifier tel ou tel élément. Si un élément doit avoir un background noir plutôt que blanc, c'est pour la même raison que tous ses voisins : parce que _la page_ arbore le thème sombre. :bulb:

### ... qui pique

Plutôt que de gérer les classes CSS ajoutées au DOM par `className`, vous pourriez utiliser `classList`.

- [**mdn** classList](https://developer.mozilla.org/en-US/docs/Web/API/Element/classList)

### ... de la mort

Au lieu d'utiliser `innerHTML` ou `textContent` pour ajouter du contenu dans le DOM, vous pourriez créer un élément du DOM de toute pièce (par la programmation) - par exemple créer des `<div class="error"> ...` directement dans le JS :scream:

- [**mdn** createElement](https://developer.mozilla.org/en-US/docs/Web/API/Document/createElement)
- [**mdn** appendChild](https://developer.mozilla.org/en-US/docs/Web/API/Node/appendChild)
