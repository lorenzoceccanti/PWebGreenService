<?php
    session_start();
    require_once "./utility/gestoreSessione.php";
    require_once "./utility/greenservicedb.php";

    if(!isUserLogged())
    {
        $baseName = ($_SERVER['PHP_SELF']);
        header("Location: ./login.php?baseName=$baseName");
    }
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Cambio anagrafica | Green Service SpA </title>
        <meta charset = "utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keywords" content = "rifiutario">
        <!-- qui metterci il link rel con text/css -->
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/stylecambioanagrafica.css">
        <link rel = "icon" href="../img/tabicon.png">
        </head>

<body>
    <?php
        require_once "./layout/header.php";
        require_once "./layout/navbar.php";
    ?>

    <h3> Cambio anagrafica </h3>

    <?php
        $user = $_SESSION['usernamevar'];
        $result = restituisciTelRes($user);
        while($row = $result->fetch_assoc())
        {
            $tel = $row['telefono'];
            $cel = $row['cellulare'];
            $citta = $row['citta'];
            $ind = $row['indirizzo'];
        }

    echo "<div id=\"box\">
        <form name=\"formCambioAnagrafica\" id=\"formCambioAnagrafica\" action=\"./process/registraCambioanagraficaprocess.php\" method=\"post\">
            <label for=\"telefono\"> Nuovo numero di telefono: </label>
            <input type = \"tel\" id=\"telefono\" name=\"telefono\" value=".$tel." required>
            <label for=\"cellulare\"> Nuovo numero di cellulare: </label>
            <input type = \"tel\" id=\"cellulare\" name=\"cellulare\" value=".$cel." required>
            <p> Nuova residenza: </p>
            <label for = \"citta\"> Città (precedente:  ".$citta.") <br> Nuova: </label>
                <select name=\"citta\" id=\"citta\">
                <option style=\"display:none\" value='nonscelto' selected> non scegliere se invariata </option>
                    <optgroup label=\"Area Nord-Ovest\">
                        <option value=\"Richman\"> Richman </option>
                        <option value=\"Mulholland\"> Mulholland </option>
                        <option value=\"Rodeo\"> Rodeo </option>
                        <option value=\"VineWood\"> VineWood </option>
                        <option value=\"Temple\"> Temple </option>
                    </optgroup>
                    <optgroup label=\"Area Centrale e Marittima\">
                        <option value=\"Market\"> Market </option>
                        <option value=\"Mulholland Intersection\"> Mulholland Intersection </option>
                        <option value=\"Downtown\"> Downtown  </option>
                        <option value=\"Commerce\"> Commerce </option>
                        <option value=\"Verona Beach\"> Verona Beach </option>
                        <option value=\"Santa Maria Beach\"> Santa Maria Beach </option>
                    </optgroup>
                    <optgroup label=\"Area Sud-Est e Portuale\">
                        <option value=\"Conference Center\"> Conference Center </option>
                        <option value=\"Verdant Bluffs\"> Verdant Bluffs </option>
                        <option value=\"Los Santos International\"> Los Santos International </option>
                        <option value=\"Ocean Docks\"> Ocean Docks </option>
                    </optgroup>
                </option>
                </select>
                <label for = \"indirizzo\"> Indirizzo (precedente:  ".$ind.")<br> Nuovo:</label>
                <input type=\"street\" name=\"indirizzo\" id=\"indirizzo\"  value=\"non sovrascrivere se invariato\">
            <input type = \"submit\" class=\"submitbutton\" value=\"Invia\">
            <button type = \"button\" id=\"annulla\" onclick=\"location.href='./contattaci.php'\"> Annulla </button>
        </form>
       
    </div>";
    ?>
    <?php
		require_once "./layout/footer.php";
	?>

</body>
</html>