<?php
    ini_set('session.cache_limiter','public');
    session_cache_limiter(false);
    session_start();
    require_once "./utility/gestoreSessione.php";
    require_once "./utility/greenservicedb.php";

    if(isUserLogged() && isAdminLoggedIn())
    {
        header("Location: ./gestione.php");
    }
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Risultati della ricerca ~ Rifiutario | Green Service SpA </title>
        <meta charset = "utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keywords" content = "rifiutario">
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/styleRifiutarioBackend.css">
        <link rel = "icon" href="../img/tabicon.png">
        <script type="text/javascript" src="../js/orologio.js">
        </script>
    </head>

<body onload="parti();">

    <?php
        require_once "./layout/header.php";
        require_once "./layout/navbar.php";
    ?>
    
    <div id="rifiutariosubtitle">
    <h1> Rifiutario </h1>
    <h3> Uno strumento utile per smaltire correttamente i nostri rifiuti </h3>
    </div>

    <div class="barraricerca">
    <form id="motorericerca" action="rifiutarioBackend.php" method="post">
        <p id="testobarra">
            Affina la precedente ricerca:
            <input type="text" name="nomerifiuto" placeholder=" Digitare il nome del rifiuto o parte di esso">
            <input type="submit" name="submitrifiutario" value="CERCA">
        </p>
    </form>
    </div>
    <h2 id="risultatititolo"> Risultati della ricerca: </h2>

    <?php
		require_once "./layout/footer.php";
	?>

</body>
</html>

<?php 

$risultatoricerca = $_POST['nomerifiuto'];
$result = ricercaRifiutario($risultatoricerca);
showResult($result);

function showResult($result)
{
    if(mysqli_num_rows($result)<> 0)
    {
        echo "<table class='tabellaphp'>
        <tr> 
            <th> Materiale </th>
            <th> Dove lo getto </th>
        </tr> ";
        while($row = $result->fetch_assoc()) {
            $riga = "<tr>
            <td>".$row['nome']."</td>
            <td>".$row['categoria']."</td>
            </tr>";
            
            echo $riga;
        }
    }
    else
    echo "<h2 id='phptext'> Nesun risultato. Controllare eventuali errori di digitazione.</h2>";
    echo "</table>";
}
?>
