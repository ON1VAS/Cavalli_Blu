<body>
<html>
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$conn = mysqli_connect("localhost", "root", "", "CavalliBluDB");

if ($conn === false) {
    die("Errore di connessione al database: " . mysqli_connect_error());
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    //ottengo i dati 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT P_ID, email, pass, admin FROM account WHERE '$email' = email AND '$password' = pass";
    $result = mysqli_query($conn, $sql);
	
	
    
    if ($result && mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
        $id = $row['P_ID']; // Prendo il valore di P_ID dalla riga restituita dalla query
		$admin = $row['admin'];
		$_SESSION['idutente'] = $id;
        $_SESSION['utente'] = $email;
		$_SESSION['admin'] = $admin;
        echo '<!DOCTYPE html>
        <html>
        <head>
            
            <script type="text/javascript"> //script per il timer
                function updateTimer() {
                    var timerElement = document.getElementById("timer");
                    var timeLeft = parseInt(timerElement.innerHTML);
                    
                    if (timeLeft <= 0) { //controllo allo scadere del timer la flag di admin
                        var isAdmin = ' . ($row['admin'] == 0 ? 'false' : 'true') . ';
                        if (isAdmin) { //se è admin reindirizza al login di admin
                            window.location.href = "loginadmin.php?sessionID=' . session_id() . '";
                        } else {
                            window.location.href = "loginutente.php?sessionID=' . session_id() . '";
                        }
                    } else {
                        timerElement.innerHTML = timeLeft - 1;
                        setTimeout(updateTimer, 1000);
                    }
                }
                setTimeout(updateTimer, 1000);
            </script>
        </head>
        <body>
            <h1>Bentornato, hai fatto il login!</h1>
            <p>Tra <span id="timer">5</span> secondi sarai reindirizzato alla pagina principale...</p>
        </body>
        </html>';
    } else {
        echo "<h1>Login errato!</h1>";
		echo '<br/><a href=provasprint2.html>Torna al login?</a>';
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
   
  h1,p,a{ 
   font-family: Arial, sans-serif; 
  } 
  h1{ 
    color: #606468; 
  } 
  p,a{ 
    Color: white; 
    size:15px; 
} 
  </style>