<?php
    session_start();
    require_once "php/utility/greenservicedb.php";
    require_once "php/utility/gestoreSessione.php";

    if(isUserLogged() && isAdminLoggedIn())
    {
        header("Location: ./php/gestione.php");
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
        <!-- qui metterci il link rel con text/css -->
        <link rel = "stylesheet" type = "text/css" href = "./css/style.css">
        <link rel = "stylesheet" type = "text/css" href = "./css/styleindex.css">
        <link rel = "icon" href="./img/tabicon.png">
       <script type="text/javascript" src="./js/orologio.js">
        </script>
</head>

<body onload="parti();">

    <?php
        require_once "./php/layout/header.php";
        require_once "./php/layout/navbar.php";
    ?>

    <img id="logo" src="./img/logo.png" alt="Green Service">

    <ul class="elencoservizi">
    <a class="underline" href="./php/portaporta.php"> <li>
        <img src = "./img/ico/logocalendario.png" alt = "Calendario servizio Porta a Porta">
        <p> Calendario <i> Porta a Porta </i> </p>
    </li> </a>

    <a class="underline" href="./php/rifiutario.php"> <li>
    <img id="iconarifiutario" src = "./img/ico/logorifiutario.png" alt = "Rifiutario">
        <p id="testorifiutario"> Rifiutario </p>
    </li> </a>

    <a class="underline" href="./php/ingombranti.php"> <li>
        <img src = "./img/ico/logoingombranti.png" alt = "Servizio ritiro ingombranti">
        <p> Ingombranti </p>
    </li> </a>

    <a class="underline" href="./php/cdr.php"> <li>
        <img src = "./img/ico/logoareaecologica.png" alt = "Area ecologica">
        <p> Area ecologica </p>
    </li> </a>

    <a class="underline" href="./php/contattaci.php"> <li>
        <img src = "./img/ico/iconafaq.png" alt = "Reclami">
        <p> Domande frequenti </p>
    </li> </a>

    <a class="underline" href="./html/about.html"> <li>
        <img src = "./img/ico/abouticona.png" alt = "About">
        <p> About </p>
    </li> </a>
    </ul>

    <p id="intro1"> Dal 2017, come da Ordinanza Nazionale, su tutto lo stato di Los Santos è obbligatorio differenziare
            i rifiuti. <br> Per questo motivo, Green Service SpA ha deciso di creare questo portale per aiutare la cittadinanza ad eseguire un corretto smaltimento.
        <br> In caso di dubbi, domande o segnalazioni di qualunque tipo non esitare a contattarci!
        </p>

        <?php
			require_once "./php/layout/footer.php";
		?>
</body>
</html>