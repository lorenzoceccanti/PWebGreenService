<?php
    session_start();
    require_once "./utility/gestoreSessione.php";
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <title> Calendario Area Centrale e Marittima | Green Service SpA </title>
        <meta charset = "utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keywords" content = "calendario,raccolta,differenziata">
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
        <link rel = "stylesheet" type = "text/css" href="../css/styleCalendario.css">
        <link rel = "icon" href="../img/tabicon.png">
        <script type="text/javascript" src="../js/orologio.js">
        </script>
    </head>

<body onload="parti();">
<body>
   
    <?php
        require_once "../php/layout/header.php";
        require_once "../php/layout/navbar.php";
    ?>

    <img id="imgMappaCE" src="../img/mappaCM2.png" alt = "Area Centrale-Marittima"> 
    <h2 id="TitleCalendario"> Calendario Area Centrale e Marittima</h2> 
   

    <div class="calendario">
    <table id="tabellaCalendarioNW">
        <tr>
            <th> &nbsp;</th>
            <th class="testo">Lunedì</th>
            <th class="testo">Martedì</th>
            <th class="testo">Mercoledì</th>
            <th class="testo">Giovedì</th>
            <th class="testo">Venerdì</th>
            <th class="testo">Sabato</th>
        </tr>
        <tr>
            <th class="testo">Organico</th>
            <th> <div class="circle" id="organico"></div> </th>
            <th> &nbsp;</th>
            <th> &nbsp;</th>
            <th> <div class="circle" id="organico"></div></th>
            <th> &nbsp;</th>
            <th> &nbsp;</th>
        </tr>
        <tr>
            <th class="testo">Indifferenziato</th>
            <th> &nbsp;</th>
            <th> &nbsp;</th>
            <th> &nbsp;</th>
            <th> &nbsp;</div></th>
            <th> <div class="circle" id="indifferenziato"></div></th>
            <th> &nbsp;</th>
        </tr>
        <tr>
            <th class="testo"> Carta</th>
            <th> &nbsp;</th>
            <th> &nbsp;</th>
            <th> <div class="circle" id="carta"></div></th>
            <th> &nbsp;</th>
            <th> &nbsp;</th>
            <th> &nbsp;</th>
        </tr>
        <tr>
            <th class="testo">Multimateriale e Vetro</th>
            <th> &nbsp;</th>
            <th> <div class="circle" id="multimateriale"></div></th>
            <th> &nbsp;</th>
            <th> &nbsp;</th>
            <th> &nbsp;</th>
            <th> &nbsp;</th>
        </tr>
    </table>
    <p id="nbsfalci"> Ricordiamo che per smaltire sfalci e potature è <u> obbligatorio</u> recarsi presso l'Area Ecologica accessibile su appuntamento </p>
    </div>


    <?php
			require_once "../php/layout/footer.php";
	?>
</body>
</html>