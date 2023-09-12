<?php
    session_start();
    require_once "./utility/gestoreSessione.php";
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> FAQ | Green Service SpA </title>
        <meta charset = "utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keywords" content = "rifiutario">
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/stylecontattaci.css">
        <link rel = "icon" href="../img/tabicon.png">
        <script type="text/javascript" src="../js/orologio.js">
        </script>
    </head>

<body onload="parti();">
    <?php
        require_once "./layout/header.php";
        require_once "./layout/navbar.php";
    ?>
    
    <div id="subtitle">
    <h1> FAQ </h1>
    <h3> Domande frequenti</h3>
    </div>

    <div class="container">
        <div class="border">
            <h2> Come posso cambiare il mio indirizzo? </h2>
            <h3 class="clickonme" onclick="location.href='./cambioAnagrafica.php#indirizzo'"> Accedendo all'area dedicata cliccando qui </h3>
        </div>
        
        <div class="border">
            <h2> Come posso inviare un reclamo? (es: mancata raccolta, disservizi, ecc) </h2>
            <h3 class="clickonme" onclick="location.href='./areareclami.php'"> Accedendo all'area reclami e segnalazioni cliccando qui </h3>
        </div>

        <div class="border">
            <h2> Come posso modificare i miei numeri di telefono? </h2>
            <h3 class="clickonme" onclick="location.href='./cambioAnagrafica.php#telefono'"> Accedendo all'area dedicata cliccando qui </h3>
        </div>

        <div class="border">
            <h2> Come posso modificare la password del mio account? </h2>
            <h3> Accedendo all'area cambio password <a href="./cambioPassword.php"> (cliccando qui)</a> avendo avuto cura di conservare le domande di sicurezza richieste all'atto della registrazione </h3>
        </div>

        <div class="border">
            <h2> Come posso visualizzare la risposta a un mio reclamo? </h2>
            <h3> Accedendo all'area dedicata <a href="./visualizzaReclamiUtente.php"> cliccando qui</a> </h3>
        </div>
        
        <div class="border">
            <h2> Ho un'altra domanda che non trova risposta in questa pagina. <br> Dove posso farla? </h2>
            <h3 class="clickonme" onclick="location.href='./areareclami.php'"> Accedendo all'area reclami e segnalazioni cliccando qui </h3>
        </div>
    </div>


    <?php
		require_once "./layout/footer.php";
	?>

</body>
</html>