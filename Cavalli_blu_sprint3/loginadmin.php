<?php
session_start();
?>
<!DOCTYPE html> 
<html> 
  <head><title>Login admin</title></head>
    <body class="align"> 
        <div class="grid"> 
            <h1 align="center" style="margin-bottom: 30px; font-size: 42px; width: 500px; margin-left: -90px;">MFS - Misinformation Fight System</h1>
            
            <form action=prova.php method="POST" class="form login">
			<h1 style="color: var(--baseColor); margin-bottom: 4px;">Analizza</h1> 
                <div class="form__field"> 
                    <label  style="color: var(--iconFill); font-weight: bolder;">Word<span class="hidden">Link</span>
                    </label>                     
                    <input autocomplete="link" type="text" name="Link" class="form__input" placeholder="Inserisci le parole chiave" required=""> 
                </div>   
					
				<div class="form__field"> 
                    <input type="submit" value="Analizza"> 
                </div>
			</form>	
			         
            
<br/>  <p class="text--center">Visualizza <a href="visblacklist.php?admin=<?php echo $_SESSION['admin']; ?>">Blacklist</a> | <a href="viswhitelist.php?admin=<?php echo $_SESSION['admin']; ?>">Whitelist</a> Globale <svg class="icon"> 
                    <use xlink:href="#icon-arrow-right"></use>                     
                </svg></p>
          <p class="text--center">Aggiungi <a href="aggblacklist.php?admin=<?php echo $_SESSION['admin']; ?>">Blacklist</a> | <a href="aggwhitelist.php?admin=<?php echo $_SESSION['admin']; ?>">Whitelist</a> Globale <svg class="icon"> 
                    <use xlink:href="#icon-arrow-right"></use>                     
                </svg></p>
          <p class="text--center">Rimuovi <a href="delblacklist.php?admin=<?php echo $_SESSION['admin']; ?>">Blacklist</a> | <a href="delwhitelist.php?admin=<?php echo $_SESSION['admin']; ?>">Whitelist</a> Globale <svg class="icon"> 
                    <use xlink:href="#icon-arrow-right"></use>                     
                </svg></p>

          <p class="text--center"><a href="visrecensioniutentiadmin.php?admin=<?php echo $_SESSION['admin']; ?>">Visualizza</a> | <a href="delrecensioniutentiadmin.php?admin=<?php echo $_SESSION['admin']; ?>">Rimuovi</a> Recensioni Utenti <svg class="icon"> 
                    <use xlink:href="#icon-arrow-right"></use>                     
                </svg></p>          
          <p class="text--center"><a href="https://www.commissariatodips.it/denuncia-per-reati-telematici/index.html" target="_blank">Segnalazione alle autorità</a></p>
          <p class="text--center"><a href="index.html" >Logout</a></p>
          
        </div>         
        <svg xmlns="http://www.w3.org/2000/svg" class="icons"> 
            <symbol id="icon-arrow-right" viewBox="0 0 1792 1792"> 
                <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/> 
            </symbol>                      
        </svg>         
    </body>     
</html> 
<style>
@use postcss-preset-env {
  stage: 0;
}


/* config.css */

:root {
  --baseColor: #606468;
}

/* helpers/align.css */

.align {
  display: grid;
  place-items: center;
}

.grid {
  inline-size: 90%;
  margin-inline: auto;
  max-inline-size: 20rem;
}

/* helpers/hidden.css */

.hidden {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

/* helpers/icon.css */

:root {
  --iconFill: var(--baseColor);
}

.icons {
  display: none;
}

.icon {
  block-size: 1em;
  display: inline-block;
  fill: var(--iconFill);
  inline-size: 1em;
  vertical-align: middle;
}

/* layout/base.css */

:root {
  --htmlFontSize: 100%;

  --bodyBackgroundColor: #2c3338;
  --bodyColor: var(--baseColor);
  --bodyFontFamily: "Open Sans";
  --bodyFontFamilyFallback: sans-serif;
  --bodyFontSize: 0.875rem;
  --bodyFontWeight: 400;
  --bodyLineHeight: 1.5;
}

* {
  box-sizing: inherit;
}

html {
  box-sizing: border-box;
  font-size: var(--htmlFontSize);
}

body {
  background-color: var(--bodyBackgroundColor);
  color: var(--bodyColor);
  font-family: var(--bodyFontFamily), var(--bodyFontFamilyFallback);
  font-size: var(--bodyFontSize);
  font-weight: var(--bodyFontWeight);
  line-height: var(--bodyLineHeight);
  margin: 0;
  min-block-size: 100vh;
}

/* modules/anchor.css */

:root {
  --anchorColor: #eee;
}

a {
  color: var(--anchorColor);
  outline: 0;
  text-decoration: none;
}

a:focus,
a:hover {
  text-decoration: underline;
}

/* modules/form.css */

:root {
  --formGap: 0.875rem;
}

input {
  background-image: none;
  border: 0;
  color: inherit;
  font: inherit;
  margin: 0;
  outline: 0;
  padding: 0;
  transition: background-color 0.3s;
}

input[type="submit"] {
  cursor: pointer;
}

.form {
  display: grid;
  gap: var(--formGap);
}

.form input[type="text"],
.form input[type="submit"] {
  inline-size: 100%;
}

.form__field {
  display: flex;
}

.form__input {
  flex: 1;
}

/* modules/login.css */

:root {
  --loginBorderRadus: 0.25rem;
  --loginColor: #eee;

  --loginInputBackgroundColor: #3b4148;
  --loginInputHoverBackgroundColor: #434a52;

  --loginLabelBackgroundColor: #363b41;

  --loginSubmitBackgroundColor: #ea4c88;
  --loginSubmitColor: #eee;
  --loginSubmitHoverBackgroundColor: #d44179;
}

.login {
  color: var(--loginColor);
}

.login label,
.login input[type="text"],
.login input[type="submit"],
.login input[type="password"],
.login textarea[type="text"]{
  border-radius: var(--loginBorderRadus);
  padding: 1rem;
}

.login label,
.login textarea{
  background-color: var(--loginLabelBackgroundColor);
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
  padding-inline: 1.25rem;
}


.login input[type="text"],
.login input[type="password"],
.login textarea[type="text"] {
  background-color: var(--loginInputBackgroundColor);
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}


.login input[type="text"]:focus,
.login input[type="text"]:hover,
.login input[type="password"]:focus,
.login input[type="password"]:hover,
.login textarea[type="text"]:focus,
.login textarea[type="text"]:hover {
  background-color: var(--loginInputHoverBackgroundColor);

}

textarea{
border: none;
color: var(--loginColor);
font-family: var(--bodyFontFamily), var(--bodyFontFamilyFallback);
font-size: var(--bodyFontSize);
font-weight: var(--bodyFontWeight);
line-height: var(--bodyLineHeight);
margin: 0;
}

textarea:focus {
  outline: none;
}


.login input[type="submit"] {
  background-color: var(--loginSubmitBackgroundColor);
  color: var(--loginSubmitColor);
  font-weight: 700;
  text-transform: uppercase;
}

.login input[type="submit"]:focus,
.login input[type="submit"]:hover {
  background-color: var(--loginSubmitHoverBackgroundColor);
}

/* modules/text.css */



.text--center {
  text-align: center;
  
}

</style>