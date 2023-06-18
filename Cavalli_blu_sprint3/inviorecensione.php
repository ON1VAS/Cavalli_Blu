<html>
	<head><title>Invio recensione</title></head>
<body>
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$conn = mysqli_connect("localhost", "root", "", "CavalliBluDB");

if ($conn === false) {
    die("Errore di connessione al database: " . mysqli_connect_error());
}

if (isset($_POST['sito']) && isset($_POST['recensione']) && isset($_POST['voto'])) {
    //ottengo i dati 
    $sito = $_POST['sito'];
	
	//controllo se la recensione c'è già nel sito
	$check = "SELECT * FROM recensioni WHERE sito = '$sito'";
	$checkris = mysqli_query($conn, $check);
	
	if (mysqli_num_rows($checkris)>0) {
		echo "<p>Recensione già inserita per questo sito.</p><br/> ";
		echo '<a href="javascript:history.go(-1)">Torna alla pagina precedente</a>';
	}
	else {
	//recensione non inserita, procedo a immetterla nel database
    $recensione = $_POST['recensione'];
	$voto = $_POST['voto'];
	$id = $_SESSION['idutente'];
	

    $sql = "INSERT INTO recensioni (sito, recensione, voto, p_id) VALUES ('$sito', '$recensione', '$voto', '$id')";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo '<!DOCTYPE html>
        <html>
        <head>
            <title>Recensione</title>
            <script type="text/javascript"> //script per il timer
                function updateTimer() {
                    var timerElement = document.getElementById("timer");
                    var timeLeft = parseInt(timerElement.innerHTML);
                    
                    if (timeLeft <= 0) { //controllo allo scadere del timer la flag di admin
                        window.location.href = "review.html";
                    } else {
                        timerElement.innerHTML = timeLeft - 1;
                        setTimeout(updateTimer, 1000);
                    }
                }
                setTimeout(updateTimer, 1000);
            </script>
        </head>
        <body>
            <p>Grazie per la recensione!</p>
            <p>Tra <span id="timer">5</span> secondi sarai reindirizzato alla pagina principale...</p>
        </body>
        </html>';
    } else {
        echo "<h3>Errore indefinito, </h3>";
		echo '<br><a href=index.html>Torna al login</a>';
    }
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