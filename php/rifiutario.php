<?php
    session_start();
    require_once "./utility/gestoreSessione.php";

    if(isUserLogged() && isAdminLoggedIn())
    {
        header("Location: ./gestione.php");
    }
?>
<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Rifiutario | Green Service SpA </title>
        <meta charset = "utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keywords" content = "rifiutario">
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/styleRifiutario.css">
        <link rel = "icon" href="../img/tabicon.png">
        <script type="text/javascript" src="../js/orologio.js">
        </script>
</head>

    <style>
        a{
            color: black;
        }
        a:hover{
            color: red;
        }
    </style>
<body onload="parti();">
    <?php
        require_once "./layout/header.php";
        require_once "./layout/navbar.php";
    ?>

    <div id="rifiutariosubtitle">
    <h1> Rifiutario </h1>
    <h3> Uno strumento utile per smaltire correttamente i nostri rifiuti </h3>
    <h3> Esegui una nuova ricerca <a href="#testobarra"> cliccando qui </a> </h3>
    </div>

    <div id="rifiutariomain">
    
    <div id="rifiutariomultim">
    <h2> Multimateriale </h2>
    <p> Gli imballaggi (flaconi, bottiglie, barattoli etc.) devono essere privi di contenuto e puliti. <br>
        <b> É importante ridurre il volume dei rifiuti di questa categoria. </b> </p>
    
    <ul class="elenco">
        <li> <b> Imballaggi alimentari in plastica </b> </li>
        <ul>
            <li> Piatti e bicchieri di plastica </li>
            <li> Bottiglie, flaconi o contenitori per acqua, bibite, olio, succhi, latte, creme, salse, yogurt, etc </li>
            <li> Confezioni rigide per dolciumi (es: scatole trasparenti e vassoi interni) </li>
            <li> Confezioni rigide/flessibili per alimenti in genere (es: affettati, formaggi, pasta fresca, frutta e verdura, etc) </li>
            <li> Buste e sacchetti per alimenti in genere (es: pasta, riso, salatini, patatine, caramelle, surgelati, etc) </li>
            <li> Vaschette porta uova o barattoli per alimenti </li>
            <li> Vaschette o barattoli per gelati, retine per frutta o verdura </li>
        </ul>

        <li> <b> Imballaggi non alimentari in plastica </b> </li>
        <ul>
            <li> Flaconi per detersivi, saponi, prodotti per l'igiene </li>
            <li> Film e pellicole da imballaggio </li>
            <li> Blister o contenitori rigidi e formati a sagoma (es: gusci per giocattoli) </li>
            <li> Buste di confezionamento di capi di vestiario </li>
            <li> Gusci, barre, chips da imballaggio in polistirolo espanso per piccoli contenitori </li>
            <li> Reggette per legatura pacchi </li>
            <li> Sacchi, sacchetti, buste (es: shoppers non biodegradabili, sacchi per detersivi, per alimenti di animali) </li>
        </ul>

        <li> <b> Cartoni per bevande (TETRAPACK) </b> </li>
        <li> <b> Metallo  </b> </li>
        <ul>
            <li> Lattine in alluminio </li>
            <li> Barattoli di metallo per alimenti ed ogni altro imballo di metallo </li>
            <li> Coperchi di barattolo </li>
        </ul>
    </ul>
    </div>

    <div id="rifiutarioorganico">
    <h2> Organico </h2>
    <p> Nella raccolta dell'organico vanno conferiti tutti i rifiuti di origine animale o vegetale: </p>
    <ul class="elenco">
        <li> Avanzi di cucina: frutta, verdura, pane, gusci di uova, fondi di caffè, ecc </li>
        <li> Avanzi di giardino solo in esigue quantità </li>
        <li> Tovaglioli usati e bustine di tè </li>
    </ul>
    </div> 

    </div>
    
    <div id="rifiutariooth">
    
    <div id="rifiutariocarta">
    <h2> Carta </h2>
    <p> Nella raccolta della carta devono essere conferiti: </p>
    <ul class="elenco">
        <li> Giornali, riviste, fogli e cartoncini </li>
        <li> Imballaggi di cartone per alimenti e scatole di cartone </li>
    </ul>
    <p> <b> Nota: </b> Gli imballaggi devono essere liberati da eventuali imballi di plastica, polistirolo o PVC </p>
    </div>

    <div id="rifiutarioindif">
    <h2> Indifferenziato </h2>
    <p> Nella raccolta dei rifiuti indifferenziati finiscono le cose che non possono essere riciclate, come: </p>
    <ul class="elenco">
        <li> Tubi per innaffiare </li>
        <li> Mozziconi di sigarette </li>
        <li> Audio o videocassette </li>
        <li> CD o DVD </li>
        <li> Posate di plastica </li>
        <li> Assorbenti igenici </li>
        <li> Bastoncini per le orecchie </li>
        <li> Lettiere per animali domestici </li>
    </ul>
    </div>


    <div id="rifiutarioingarea">
    <p> Tutto ciò che non è soprariportato appartiene alla categoria 'Ingombranti' o deve essere conferito
        presso l'Area Ecologica. In caso di dubbi, si prega di effettuare una ricerca. </p>
    </div>
    
    <div class="barraricerca">
    <h2> Nuova ricerca: </h2>
    <form id="motorericerca" action="rifiutarioBackend.php" method="post">
        <p id="testobarra">
            <input type="text" name="nomerifiuto" placeholder=" Digitare il nome del rifiuto o parte di esso">
            <input type="submit" name="submitrifiutario" value="CERCA">
        </p>
    </form>
    </div>

    </div>
    <?php
			require_once "./layout/footer.php";
	?>
</body>
</html>

