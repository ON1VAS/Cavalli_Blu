<html>
	<head><title>MFS Notizie</title></head>
<body>
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$conn = mysqli_connect("localhost", "root", "", "CavalliBluDB");

if ($conn === false) {
    die("Errore di connessione al database: " . mysqli_connect_error());
}

$apikey = '6ebff20c9be5f5b942b7e24530032205';
$q = isset($_POST['Link']) ? urlencode($_POST['Link']) : '';
$url = "https://gnews.io/api/v4/search?q=$q&lang=it&country=it&max=10&apikey=$apikey&sortBy=relevance";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = json_decode(curl_exec($ch), true);
curl_close($ch);

if (isset($data['articles']) && is_array($data['articles'])) {
    $articles = $data['articles'];
    $keywordsToExclude = ["Drago volante",
    "Unicorno magico",
    "Alieno dal pianeta Zorg",
    "Stregone delle dimensioni",
    "Mago che parla con gli animali",
    "Fata dei sogni",
    "Cavaliere fantasma",
    "Ninja spaziale",
    "Robottino amichevole",
    "Sirena volante",
    "Gigante gentile",
    "Vampiro vegetariano",
    "Mostro marino a tre teste",
    "Fenice eterna",
    "Folletto invisibile",
    "Cavaliere del regno delle ombre",
    "Leprechaun custode del tesoro",
    "Mago del tempo",
    "Dama dell'etere",
    "Arciere dell'aldilà",
    "Squalo volante",
    "Orco delle nevi",
    "Gnomo cantante",
    "Spirito della foresta",
    "Signore dei gatti",
    "Guerriero del sole",
    "Gigante di cristallo",
    "Elfo meccanico",
    "Folletto delle meraviglie",
    "Strega delle stelle",
    "Druido delle ombre",
    "Dama del lago",
    "Cacciatrice di fate",
    "Goblin sorridente",
    "Fata delle tempeste",
    "Custode delle porte dimensionali",
    "Mago dell'illusione",
    "Cavaliere alato",
    "Vedova nera",
    "Saggio delle rune",
    "Guardiano del tempo",
    "Sirena delle acque profonde",
    "Guerriero di fuoco",
    "Guardiano dell'abisso",
    "Divinità del vento",
    "Signore delle illusioni",
    "Principe degli specchi",
    "Arciere delle stelle",
    "Folletto del vortice",
    "Mago della luce",
    "Cavaliere oscuro",
    "Lupo mannaro selvaggio",
    "Creatura del ghiaccio",
    "Stregone delle ombre",
    "Vampira affamata",
    "Drago d'oro",
    "Saggio delle ombre",
    "Angelo caduto",
    "Guerriero spettrale",
    "Ninja silenzioso",
    "Fata incantata",
    "Guardiano delle fate",
    "Mago delle illusioni",
    "Cavaliere del tuono",
    "Cacciatore di mostri",
    "Strega delle tenebre",
    "Orco affamato",
    "Golem di pietra",
    "Fenomeno cosmico",
    "Sirena delle stelle",
    "Guardiano dell'alba",
    "Custode del regno incantato",
    "Drago di fuoco",
    "Guerriero senza paura",
    "Folletto delle acque",
    "Mago delle tempeste",
    "Arciere delle ombre",
    "Stregone delle illusioni",
    "Custode del tempo",
    "Sirena misteriosa",
    "Cavaliere dell'eternità",
    "Guerriero celestiale",
    "Fata del mare",
    "Angelo guerriero",
    "Drago sputafuoco",
    "Signore delle tempeste",
    "Guardiano delle ombre",
    "Mago dei sogni",
    "Cavaliere del destino",
    "Orco selvaggio",
    "Goblin misterioso",
    "Folletto delle stelle",
    "Strega delle illusioni",
    "Saggio delle fiamme",
    "Guerriero del vento",
    "Vampiro eterno",
    "Ninja delle tenebre",
    "Drago di ghiaccio",
    "Elfo delle acque",
    "Arciere dei sogni",
    "Mago delle ombre",
    "Custode delle stelle",
    "Sirena incantatrice",
    "Cavaliere delle fiamme",
    "Fata della luna",
    "Stregone delle stelle",
    "Signore delle tenebre",
    "Goblin affamato",
    "Lupo mannaro solitario",
    "Creatura dell'oscurità",
    "Angelo custode",
    "Guerriero leggendario",
    "Folletto dell'arcobaleno",
    "Mago delle fiamme",
    "Cavaliere delle tempeste",
    "Spirito delle ombre",
    "Drago dorato",
    "Strega delle stelle cadenti",
    "Arciere misterioso",
    "Ninja delle illusioni",
    "Guardiano delle anime",
    "Sirena delle profondità",
    "Custode del regno delle fate",
    "Mago delle tenebre",
    "Cavaliere della luce",
    "Guerriero demoniaco",
    "Fata del vento",
    "Signore dei sogni",
    "Drago di cristallo",
    "Stregone del fuoco",
    "Elfo delle ombre",
    "Arciere delle tempeste",
    "Mago dell'oscurità",
    "Cavaliere delle stelle",
    "Saggio delle illusioni",
    "Guerriero della notte",
    "Vampiro senza pietà",
    "Ninja del fulmine",
    "Folletto delle nevi",
    "Spirito del mare",
    "Angelo della vendetta",
    "Guerriero intergalattico",
    "Goblin misterioso",
    "Fata delle stelle cadenti",
    "Custode dei segreti",
    "Mago del destino",
    "Cavaliere del regno delle ombre",
    "Sirena delle acque incantate",
    "Drago di fuoco",
    "Strega delle illusioni",
    "Arciere delle tenebre",
    "Ninja delle anime",
    "Guardiano del tempo",
    "Saggio delle fiamme",
    "Guerriero dell'oscurità",
    "Fata del vento",
    "Signore dei sogni",
    "Elfo di luce",
    "Stregone del fuoco",
    "Cavaliere delle ombre",
    "Mago dell'oscurità",
    "Sirena delle tempeste",
    "Custode delle anime",
    "Drago di ghiaccio",
    "Arciere della luna",
    "Ninja delle illusioni",
    "Guerriero delle stelle",
    "Folletto delle tenebre",
    "Angelo della guarigione",
    "Goblin affamato",
    "Strega dei desideri",
    "Mago delle ombre",
    "Cavaliere delle fiamme",
    "Spirito delle stelle",
    "Vampiro eterno",
    "Cacciatore di demoni",
    "Elfo delle acque",
    "Fata del crepuscolo",
    "Signore delle tenebre",
    "Drago di lava",
    "Guerriero del destino",
    "Arciere delle ombre",
    "Mago delle illusioni",
    "Custode del tempo",
    "Sirena incantatrice",
    "Cavaliere delle stelle cadenti",
    "Ninja delle tenebre",
    "Stregone delle fiamme",
    "Goblin astuto",
    "Folletto delle stelle luminose",
    "Angelo custode delle anime",
    "Guerriero delle tempeste",
    "Mago delle ombre",
    "Cavaliere delle illusioni",
    "Saggio delle stelle",
    "Drago di fuoco infernale",
    "Strega delle tempeste",
    "Arciere del sole",
    "Ninja del veleno",
    "Guardiano delle anime perdute",
    "Sirena delle profondità oscure",
    "Custode delle antiche leggende",
    "Mago delle tenebre supreme",
    "Cavaliere dell'infinito",
    "Guerriero delle galassie",
    "Fata dell'eternità",
    "Stregone delle ombre profonde",
    "Signore dei sogni proibiti",
    "Goblin del caos",
    "Folletto del destino incerto",
    "Elfo della luna nera",
    "Angelo delle dimensioni",
    "Guerriero delle anime perdute",
    "Drago delle tenebre eteree",
    "Saggio delle tempeste arcane",
    "Arciere delle ombre oscure",
    "Mago delle illusioni divine"]; // Aggiungi qui le parole chiave irrealistiche

    $containsIrrealisticKeywords = false;

    foreach ($articles as $article) {
        if (containsIrrealisticKeywords($article, $keywordsToExclude)) {
            $containsIrrealisticKeywords = true;
            break;
        }
    }

    if ($containsIrrealisticKeywords) {
        echo "<p>Sono presenti parole chiave che portano a fake news. Visualizzazione interrotta.</p>";
		echo '<br><a href="javascript:history.go(-1)">Torna alla pagina precedente</a>';
        exit;
    }

    foreach ($articles as $article) {
        echo "<hr><p><b>Title: </b>" . $article['title'] . "</p>";
        echo "<p><b>Description: </b>" . $article['description'] . "</p>";
        echo "<p><b>Link:</b> <a href=\"" . $article['url'] . "\">" . $article['url'] . "</a></p><br/><br>";

        if (isset($article['image'])) {
            echo '<img src="' . $article['image'] . '" alt="Article Image" width="500"><br>';
        }

        $urlParts = parse_url($article['url']);
        $baseUrl = $urlParts['scheme'] . '://' . $urlParts['host'];

        // Verifica se l'URL è presente nella whitelist
        $query = "SELECT sito FROM whitelist WHERE sito = '" . $conn->real_escape_string($baseUrl) . "'";
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            echo "<p><b>Indice di affidabilità:</b> affidabile -> presente nella whitelist</p>";
        } else {
            // Verifica se l'URL è presente nella blacklist
            $query = "SELECT sito FROM blacklist WHERE sito = '" . $conn->real_escape_string($baseUrl) . "'";
            $result = $conn->query($query);
            if ($result && $result->num_rows > 0) {
                echo "<p><b>Indice di affidabilità:</b> non affidabile -> presente nella blacklist</p>";
            }
        }

        // Calcola la percentuale delle recensioni positive per il sito
        $query = "SELECT COUNT(*) AS total_reviews, SUM(voto = 0) AS positive_reviews FROM recensioni WHERE sito = '" . $conn->real_escape_string($baseUrl) . "'";
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $totalReviews = $row['total_reviews'];
            $positiveReviews = $row['positive_reviews'];

if ($totalReviews > 0) {
                $positivePercentage = ($positiveReviews / $totalReviews) * 100;
                echo "<p><b>Percentuale recensioni positive:</b> " . round($positivePercentage, 2) . "%</p>";
                
                // Verifica delle condizioni sulla percentuale delle recensioni positive
                if ($positivePercentage > 60) {
                    echo "<p>Affidabile secondo le recensioni degli utenti.</p><br/>";
                } elseif ($positivePercentage >= 50 && $positivePercentage <= 60) {
                    echo "<p>Parzialmente affidabile secondo le recensioni degli utenti.</p><br/>";
                } elseif ($positivePercentage < 50) {
                    echo "<p>Non affidabile secondo le recensioni degli utenti -> fakenews oppure satira.</p><br/>";
                }
            } else {
                echo "<p>Nessuna recensione disponibile per il sito.</p><br/>";
            }
        } else {
            echo "<p>Nessuna recensione disponibile per il sito.</p><br/>";
        }

        echo "<br>";
    }

    if (count($articles) === 0) {
        echo "<p>Nessun articolo trovato.</p>";
    }
} else {
    echo "<p>Nessun articolo trovato.</p>";
}

echo '<br><a href="javascript:history.go(-1)">Torna alla pagina precedente</a>';

// Funzione per verificare se un articolo contiene parole chiave irrealistiche
function containsIrrealisticKeywords($article, $keywordsToExclude) {
    $title = strtolower($article['title']);
    $description = strtolower($article['description']);

    foreach ($keywordsToExclude as $keyword) {
        if (strpos($title, $keyword) !== false || strpos($description, $keyword) !== false) {
            return true;
        }
    }

    return false;
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
    color: white;
    size:15px;
}
  </style>