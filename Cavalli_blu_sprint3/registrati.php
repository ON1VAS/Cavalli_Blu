<html>
 <head><title>Registrazione</title></head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$conn = mysqli_connect("localhost", "root", "", "CavalliBluDB");

if ($conn === false) {
    die("Errore di connessione al database: " . mysqli_connect_error());
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO account (email, pass) VALUES ('$email', '$password')";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo '<!DOCTYPE html>
        <html>
        <head>
            <script type="text/javascript">
                function updateTimer() {
                    var timerElement = document.getElementById("timer");
                    var timeLeft = parseInt(timerElement.innerHTML);
                    
                    if (timeLeft <= 0) {
                        window.location.href = "provasprint2.html";
                    } else {
                        timerElement.innerHTML = timeLeft - 1;
                        setTimeout(updateTimer, 1000);
                    }
                }
                setTimeout(updateTimer, 1000);
            </script>
        </head>
        <body>
            <h1>Registrazione effettuata!</h1>
            <p>Tra <span id="timer">5</span> secondi sarai reindirizzato alla pagina principale per il login...</p>
        </body>
        </html>';
    } else {
        echo "<p>Errore nella query: </p>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
</body>
</html>
<style>
  body {
      background-color: #2c3338;
    }
  
  h1,p{
   Color: #606468;
   font-family: Arial, sans-serif;
  }
  
  p{
    size:15px;
}
  </style>