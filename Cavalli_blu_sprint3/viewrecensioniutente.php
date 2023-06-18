<html>
 <head><title>Visualizza recensioni</title></head>
  <body>
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$conn = mysqli_connect("localhost", "root", "", "CavalliBluDB");

if ($conn === false) {
    die("Errore di connessione al database: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

	$contatore = 0;
	$id = $_SESSION['idutente'];
	$sql = "SELECT Rec_ID, sito, recensione, voto FROM recensioni WHERE p_id='$id'";
    $result = mysqli_query($conn, $sql);
	
	if($result && mysqli_num_rows($result) > 0){
		echo "<h1>Ecco tutte le recensioni:</h1>";
		while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['Rec_ID'];
        $sito = $row['sito'];
        $recensione = $row['recensione'];
        $voto = $row['voto'];

        // Stampa i dati
		echo "<hr/><p><b>ID Recensione:</b> $id<br></p>";
        echo "<p><b>Sito:</b> $sito<br></p>";
        echo "<p><b>Recensione:</b><br> $recensione<br></p>";
        if($voto==1)
		echo "<p><b>Valutazione: Negativa</b><br></p>";
		else
		echo "<p><b>Valutazione: Positiva</b><br></p>";
       
		
    }
	echo '<a href="javascript:history.back()"> <br>Torna indietro</a>';
}
	else{
		echo '<p>Non hai ancora creato una recensione!</p>';
		echo '<a href="javascript:history.back()"> <br>Torna indietro</a>';
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