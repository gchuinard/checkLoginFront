<div id="login">
      <form action="" id="login-form" method="post" autocomplete="off">
        <div id="form-title">
          Connexion
        </div>
        <div class="field">
          <label 
            class="field-label"
            for="field-username"
          >
            Identifiant
          </label>
          <input
            class="field-input"
            id="field-username"
            name="username"
            type="text"
            placeholder="Identifiant"
          />
          <p class="field-info">Obligatoire - doit contenir au minimum 3 caractères</p>
        </div>
        <div class="field">
          <label 
            class="field-label"
            for="field-password"
          >
            Mot de passe
          </label>
          <input
            class="field-input"
            id="field-password"
            name="password"
            type="password"
            placeholder="Mot de passe"
          />
          <p class="field-info">Obligatoire - doit contenir au minimum 3 caractères</p>
        </div>
        <div id="errors"></div>
        <button id="login-submit">Connexion</button>
      </form>
    </div>