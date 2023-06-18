<head><title>Visualizza recensioni</title></head>
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$conn = mysqli_connect("localhost", "root", "", "CavalliBluDB");

if ($conn === false) {
    die("Errore di connessione al database: " . mysqli_connect_error());
}

if (isset($_POST['Rec_ID'])) {
    $recid = $_POST['Rec_ID'];
    $id = $_SESSION['idutente'];

    // Verifica se l'ID utente corrisponde, ma l'ID della recensione non corrisponde
    $query = "SELECT * FROM recensioni WHERE p_id='$id' AND Rec_ID='$recid'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // L'ID utente corrisponde ma l'ID della recensione non corrisponde
        $sql = "DELETE FROM recensioni WHERE p_id='$id' AND Rec_ID='$recid'";
        $cancResult = mysqli_query($conn, $sql);
        if ($cancResult) {
            echo "<script>alert('La recensione è stata cancellata!');</script>";
        } else {
            echo "<script>alert('Si è verificato un errore durante l\'eliminazione della recensione.');</script>";
        }
    } else {
        // Verifica se l'ID della recensione non esiste nel database
        $query = "SELECT * FROM recensioni WHERE Rec_ID='$recid'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 0) {
            echo "<script>alert('Questa recensione non esiste.');</script>";
        } else {
            echo "<script>alert('Non hai scritto tu la recensione.');</script>";
        }
    }
}
?>
<!DOCTYPE html> 
<html> 
    <body class="align"> 
        <div class="grid"> 
            <h1 align="center" style="margin-bottom: 30px; font-size: 42px; width: 500px; margin-left: -90px;">MFS - Misinformation Fight System </h1>
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form login">
                <h1 style="color: var(--baseColor); margin-bottom: 4px;">Elimina una recensione</h1> 
                <div class="form__field"> 
                    <label for="rec_id" style="color: var(--iconFill); font-weight: bolder;">ID<span class="hidden"></span>
                    </label>                     
                    <input autocomplete="link" type="text" name="Rec_ID" class="form__input" placeholder="Scrivi l'ID della recensione" required=""> 
                </div>   
                    
                <div class="form__field"> 
                    <input type="submit" value="Invia"> 
                </div>
            </form> 
            <p class="text--center"><a href="review.html">Torna Indietro</a></p>             
        </div>         
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

