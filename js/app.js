var app = {
  init: function() {
    // cette fonction est exécutée au chargement de la page

    // 1. identifier les éléments dont je vais avoir besoin souvent
    app.usernameInput = document.querySelector("#field-username");
    app.passwordInput = document.querySelector("#field-password");
    app.form = document.querySelector("#login-form");
    app.errorsContainer = document.querySelector("#errors");

    // bonus thème sombre
    app.themeSwitcher = document.querySelector("#theme-switcher");

    // 2. surveiller les changements de valeur des champs
    // blur = événement déclenché quand on quitte un champ (ou un lien ou tout autre élément avec lequel il est possible d'interagir)
    // solution sauvage mais fonctionnelle, on vérifie si l'élément form a été trouvé
    // et si ce n'est pas le cas, on saute tous les écouteurs d'événements liés au formulaire de connexion
    if (app.form != null) {
      app.usernameInput.addEventListener('blur', app.handleAnyInputBlur);
      app.passwordInput.addEventListener('blur', app.handleAnyInputBlur);
      app.form.addEventListener('submit', app.handleFormSubmit);
    }

    // bonus thème sombre
    app.themeSwitcher.addEventListener('change', app.triggerThemeSwitch);
  },
  triggerThemeSwitch: function(evt) {
    // evt : l'objet événement qui contient les infos habituelles, dont...
    // evt.target : l'élément ayant déclenché l'événement, ici le select. Bon à savoir : tous les éléments de formulaire contiennent une propriété ...
    // evt.target.form : désigne le formulaire auquel mon select appartient
    // evt.target.form.submit() : méthode qui envoie le formulaire avec les données qu'il contient actuellement
    // petite précision : cette méthode ne déclenche pas d'événement submit, attention quand vous l'utilisez
    evt.target.form.submit();
  },
  handleFormSubmit: function(evt) {
    // pour voir ce que evt a dans le ventre, un console.log sera votre allié de choix
    //console.log(evt);
    // je déclare un paramètre evt pour pouvoir stopper l'envoi du formulaire en cas d'erreur

    // la finalité sera d'avoir dans cette variable la vraie valeur, true si tout est ok et qu'on est prêt à laisser le formulaire être envoyé, false s'il y a un os (ou plusieurs) et qu'on doit empêcher l'envoi
    //var isValid = false;

    // on va lancer manuellement une vérif sur app.usernameInput puis app.passwordInput
    // par contre, il y a déjà pas mal de traitement écrit dans la méthode du dessous : handleAnyInputBlur
    // on peut peut-être factoriser...

    // dans l'idéal, voilà ce qu'on voudrait avoir
    // 2 tests faits par une méthode indépendante, à laquelle on passe l'élément à tester
    var userOk = app.isInputValid(app.usernameInput);
    var passOk = app.isInputValid(app.passwordInput);

    // on vide notre div d'erreurs
    app.errorsContainer.textContent = "";

    if (!userOk) {
      app.displayErrorMessage("Identifiant doit contenir au moins 3 caractères");
    }

    if (!passOk) {
      app.displayErrorMessage("Mot de passe doit contenir au moins 3 caractères");
    }

    var isValid = userOk && passOk;

    // si le formulaire n'est pas valide, on empêche son envoi
    if (!isValid) evt.preventDefault();
  },
  displayErrorMessage: function(message) {
    var errorMessage = document.createElement('p');
    errorMessage.textContent = message;
    errorMessage.classList.add('error');
    // attacher le message à l'emplacement où s'affichent ces messages
    app.errorsContainer.appendChild(errorMessage);
  },
  isInputValid: function(input) {
    var value = input.value;

    input.classList.remove('valid', 'invalid');

    if (value.length < 3) {
      input.classList.add('invalid');
    } else {
      input.classList.add('valid');
    }

    return value.length >= 3;
  },
  handleAnyInputBlur: function(evt) {
    
    app.isInputValid(evt.target);
  }
};

document.addEventListener('DOMContentLoaded', app.init);