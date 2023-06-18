<html>
 <head><title>Visualizza blacklist</title></head>
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
  $sql = "SELECT * FROM blacklist";
  $result = mysqli_query($conn, $sql);

  echo "<title>Blacklist</title>";
if($result && mysqli_num_rows($result) > 0){
	echo "<h1>Ecco tutti i siti della blacklist:</h1>";
  while($row = mysqli_fetch_assoc($result)){
    		$id = $row['B_ID'];
        $sito = $row['sito'];

    //stampa i dati

    echo "<hr/><p>ID Blacklist: $id</p>";
    echo "<p>Sito: $sito</p>";
  }
    echo '<a href="javascript:history.back()"> <br/>Torna indietro</a>';
}
else{
    echo "<hr/><p>Non ci sono ancora siti nella blacklist globale!</p>";
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