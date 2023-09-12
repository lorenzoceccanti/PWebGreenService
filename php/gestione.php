<?php
    session_start();
    require_once "utility/greenservicedb.php";
    require_once "utility/gestoreSessione.php";

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
        <title> Home Page | Green Service SpA </title>
        <meta charset = "utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "description" content = "Guida allo smaltimento dei rifiuti">
        <meta name = "keywords" content = "rifiuto,ecologia,differenziata">
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/styleindex.css">
        <link rel = "icon" href="../img/tabicon.png">
</head>

<body>

    <?php
        require_once "./layout/navbargestore.php";
    ?>

    <img id="logo" src="../img/logo.png" alt="Green Service">

    <ul class="elencoservizi">

    <a class="underline" href="./ingombrantiGestore.php"> <li>
        <img src = "../img/ico/logoingombranti.png" alt = "Servizio ritiro ingombranti">
        <p> GESTIONE <i> INGOMBRANTI </i> </p>
    </li> </a>

    <a class="underline" href="./visualizzaAppuntamentiGestorecdr.php"> <li>
        <img src = "../img/ico/logoareaecologica.png" alt = "Area ecologica">
        <p> GESTIONE <i> <br> AREA ECOLOGICA </i> </p>
    </li> </a>

    <a style = "" class="underline" href="./reclamiGestore.php"> <li>
        <img src = "../img/ico/logoreclami.png" alt = "Reclami">
        <p> GESTIONE <br> <i> RECLAMI </i> </p>
    </li> </a>

    <a class="underline" href="../html/about.html"> <li>
        <img src = "../img/ico/abouticona.png" alt = "About">
        <p> About </p>
    </li> </a>
    </ul>

        <?php
			require_once "./layout/footer.php";
		?>
</body>
</html>