<?php
    session_start();
    require_once "./utility/gestoreSessione.php";

    if(!isUserLogged())
    {
        $baseName = ($_SERVER['PHP_SELF']);
        header("Location: ./login.php?baseName=$baseName");
    }

    if(isUserLogged() && !isAdminLoggedIn())
    {
        header("Location: ./riuscito.php?operazione=adminonly");
    }
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Rispondi al reclamo | Green Service SpA </title>
        <meta charset = "utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keywords" content = "rifiutario">
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
        <link rel ="stylesheet" type="text/css" href="../css/stylecambioanagrafica.css">
        <link rel = "icon" href="../img/tabicon.png">

        <style>
        </style>
</head>

<body>
    <div id="box">
        <?php
        $id = $_GET['id'];
        echo "<form name='formrispReclamo' id='formrispReclamo' action=\"./process/registraRispostaReclamoprocess.php?id=$id\" method=\"post\">";
        ?>
            <label for="reclamoText"> Messaggio: </label>
            <br>
            <br>
            <textarea pattern = "{1,2000}" id="rispostareclamoText" class="text" cols="86" rows="20" name="rispostareclamoText" form="formrispReclamo" required> </textarea>
            <br>
            <input type = "submit" class="submitbutton" value="Invia"> 
            <button type = "button" id="annulla" onclick="location.href='./reclamiGestore.php'"> Annulla </button>
        </form>
    </div>
</body>
</html>