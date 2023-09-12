<?php
    session_start();
    require_once "./utility/gestoreSessione.php";

    if(!isUserLogged())
    {
        $baseName = ($_SERVER['PHP_SELF']);
        header("Location: ./login.php?baseName=$baseName");
    }
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Reclami e segnalazioni | Green Service SpA </title>
        <meta charset = "utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keywords" content = "rifiutario">
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/stylereclami.css">
        <link rel = "icon" href="../img/tabicon.png">
</head>
<body>
    <?php
        require_once "./layout/header.php";
        require_once "./layout/navbar.php";
    ?>
    
    <div id="subtitle">
    <h1> Reclami e segnalazioni</h1>
    <h3> Esponi il tuo problema</h3>
    </div>

    <div id="box">
        <form name="formReclamo" id="formReclamo" action="./process/registraReclamoprocess.php" method="post">
            <label for="categoria"> Categoria: </label>
            <select name="categoria" id="categoria" required>
            <option style="display:none" value="" disabled selected> scegli </option>
                <option value="mancatoritiropap"> MANCATO RITIRO PORTA A PORTA </option>
                <option value="mancatoritiroingombranti"> MANCATO RITIRO INGOMBRANTI </option>
                <option value="smarrimentocontenitore"> SMARRIMENTO CONTENITORE </option>
                <option value="dichiarazionepositivitacovid-19"> DICHIARAZIONE POSITIVITA' COVID-19 </option>
                <option value="altro"> ALTRO (rifiuto non conforme al rifiutario, assenza di orari disponibili, mancata risposta e-mail, domande non frequenti, ecc) </option>
            </select>
            <label for="reclamoText"> Messaggio: </label>
            <textarea pattern = "{1,2000}" id="reclamoText" class="text" cols="86" rows="20" name="reclamoText" form="formReclamo" required> </textarea>
            <input type = "submit" class="submitbutton" value="Invia"> 
        </form>
       
    </div>

    <?php
		require_once "./layout/footer.php";
	?>

</body>
</html>