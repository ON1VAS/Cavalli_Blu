<!DOCTYPE html>
<html>
<head>
    <title>Cancella Recensione</title>
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
</head>
<body class="align">
    <div class="grid">
        <h1 align="center" style="margin-bottom: 30px; font-size: 42px; width: 500px; margin-left: -90px;">MFS - Misinformation Fight System</h1>
        <?php
   
    ini_set('display_errors', 'On');
    $conn = mysqli_connect("localhost", "root", "", "CavalliBluDB");
    $admin = $_GET['admin'];
    if ($conn === false) {
        die("Errore di connessione al database: " . mysqli_connect_error());
    }

    if ($admin != 1) {
        // Reindirizza all'area di login o a un'altra pagina di gestione degli accessi
        echo "<p>Non hai i permessi per effettuare l'operazione</p>";
        echo '<a href="index.html"> <br/>Torna al login</a>';
        exit();
    }

    // Controllo se l'ID è stato fornito
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // ID dell'utente da cancellare
        $id = $_POST['id'];

        // Controllo se l'ID è un numero intero
        if (!is_numeric($id)) {
            echo "<p>Il valore inserito non è valido. Inserisci un ID numerico.</p>";
            echo '<p class="text--center"><a href="javascript:history.back()">Torna indietro</a></p>';
            exit();
        }

        // Query per cancellare la recensione
        $sql = "DELETE FROM recensioni WHERE Rec_ID = $id";

        // Esecuzione della query
        if ($conn->query($sql) === TRUE) {
            echo "<p>Cancellazione effettuata.</p>";
        } else {
            echo "<p>Errore durante la cancellazione: " . $conn->error . "</p>";
        }
    }
    ?>

    <form action="" method="POST" class="form login">
        <h1 style="color: var(--baseColor); margin-bottom: 4px;">Cancella Recensione</h1>
        <div class="form__field">
            <label style="color: var(--iconFill); font-weight: bolder;">ID<span class="hidden">ID</span></label>
            <input type="text" name="id" class="form__input" placeholder="Inserisci l'id" required="">
        </div>
        <div class="form__field">
            <input type="submit" value="Cancella">
        </div>
    </form>
    <p class="text--center"><a href="javascript:history.back()">Torna indietro</a></p>

    <?php
    // Chiusura della connessione al database
    $conn->close();
    ?>
</div>
</body>
</html>