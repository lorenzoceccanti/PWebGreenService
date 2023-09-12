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
        <title> Gestore Ingombranti | Green Service SpA</title>
        <meta charset="utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keyword" content = "greenservice">
        <link rel = "stylesheet"  type = "text/css" href = "../css/style.css">
        <link rel = "stylesheet"  type = "text/css" href = "../css/styleIngombranti.css">
        <link rel = "icon" href="../img/tabicon.png">
    </head>

    <body>
    <?php
        require_once "./layout/headergestore.php";
        require_once "./layout/navbargestore.php";
 
    ?>

    <div id="logoIng">
        <img src="../img/ico/logoingombranti.png" alt="Logo Ingombranti">
        <h1 style="font-size: 35px;"> Gestione ingombranti </h1>
    </div>

     <ul class="elencosvingombranti">
            <a class="underline" href="./visualizzaAppuntamentiGestore.php"> <li>  
                    <img src="../img/imieiappuntamentilogo.png" alt="I miei appuntamenti">
                    <p> Viusalizza Appuntamenti </p>
            </li> </a>
            <a class="underline" href="./contrassegnaIngombranti.php"> <li>    
                    <img src="../img/completo.png" alt="Nuovo appuntamento">
                    <p> Contrassegna appuntamento come completato </p>
                
            </li> </a>
    </ul>

    <?php
        require_once "./layout/footer.php"
    ?>
    </body>
</html>
