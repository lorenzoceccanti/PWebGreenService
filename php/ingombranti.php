<?php
    session_start();
    require_once "./utility/gestoreSessione.php";

    if(!isUserLogged())
    {
        $baseName = ($_SERVER['PHP_SELF']);
        header("Location: ./login.php?baseName=$baseName");
    }

    if(isUserLogged() && isAdminLoggedIn())
    {
        header("Location: ./gestione.php");
    }
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Ritiro Ingombranti | Green Service SpA</title>
        <meta charset="utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keyword" content = "greenservice">
        <link rel = "stylesheet"  type = "text/css" href = "../css/style.css">
        <link rel = "stylesheet"  type = "text/css" href = "../css/styleIngombranti.css">
        <link rel = "icon" href="../img/tabicon.png">
    </head>

    <body>
    <?php
        require_once "./layout/header.php";
        require_once "./layout/navbar.php";
    ?>

  
    <div id="logoIng">
        <img src="../img/ico/logoingombranti.png" alt="Logo Ingombranti">
        <h1> Ritiro ingombranti </h1>
    </div>

     <ul class="elencosvingombranti">
            <a class="underline" href="./visualizzaAppuntamentiIngombranti.php"> <li>  
                    <img src="../img/imieiappuntamentilogo.png" alt="I miei appuntamenti">
                    <p> I miei appuntamenti </p>
            </li> </a>
            <a class="underline" href="./nuovoAppuntamentoIngombranti.php"> <li>    
                    <img src="../img/inseriscilogo.png" alt="Nuovo appuntamento">
                    <p> Nuovo appuntamento </p>
                
            </li> </a>
            <a class="underline" href="./cancellaAppuntamentoIngombranti.php"> <li>
                    <img src="../img/cancellaingombrantilogo.png" alt="Nuovo appuntamento">
                    <p> Cancella appuntamento </p>
            </li> </a>
    </ul>

    <?php
        require_once "./layout/footer.php"
    ?>
    </body>
</html>
