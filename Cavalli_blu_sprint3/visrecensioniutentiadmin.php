<html>
<head><title>Recensioni Utenti</title></head>
  <body>
    <h1>Recensioni Utenti</h1>
<?php
// Connessione al database
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$conn = mysqli_connect("localhost", "root", "", "CavalliBluDB");
$admin = $_GET['admin'];
if ($conn === false) {
    die("Errore di connessione al database: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");
if ($admin != 1) {
    // Reindirizza all'area di login o a un'altra pagina di gestione degli accessi
    echo "<p>Non hai i permessi per effettuare l'operazione</p>";
    echo '<a href="index.html"> <br/>Torna al login</a>';
	exit();
}

// Query per recuperare le recensioni ordinate per sito recensito
$sql = "SELECT * FROM recensioni ORDER BY sito";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Stampa delle recensioni
    while($row = $result->fetch_assoc()) {
		echo "<br><hr><p><b>ID Recensione:</b> " . $row["Rec_ID"] . "</p>";
        echo "<p><b>Utente:</b> " . $row["p_id"] . "</p>";
        echo "<p><b>Sito recensito:</b> " . $row["sito"] . "</p>";
        echo "<p><b>Recensione:</b> " . $row["recensione"] . "</p>";
		if($row["voto"] == 0) {
			echo "<p><b>Voto: Positivo </b></p>"; 
		} else {
			echo "<p><b>Voto: Negativo </b></p>"; }
    }
		echo '<html>
				<script>
			function goBack() {
			window.location.href = document.referrer;
				}
			</script>
			<a href="javascript:void(0);" onclick="goBack()">Torna indietro</a>';
} else {
    echo "<p>Nessuna recensione trovata.</p>";
	echo '<script>
			function goBack() {
			window.location.href = document.referrer;
				}
			</script>
			<a href="javascript:void(0);" onclick="goBack()">Torna indietro</a>';
}

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