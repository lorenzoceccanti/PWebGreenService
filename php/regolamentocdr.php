<?php
    session_start();
    require_once "./utility/gestoreSessione.php";
    require_once "./utility/greenservicedb.php";
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Regolamento Area Ecologica | Green Service SpA</title>
        <meta charset="utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keyword" content = "greenservice">
        <link rel = "stylesheet"  type = "text/css" href = "../css/style.css">
        <link rel ="stylesheet" type="text/css" href="../css/stylerules.css">
        <link rel = "icon" href="../img/tabicon.png">
    </head>

    <body>
    <?php
        require_once "./layout/header.php";
        require_once "./layout/navbar.php";
    ?>

    <div id="logoIng">
        <h1> Area Ecologica </h1>
    </div>

    <h2> Regolamento </h2>

    <ul>
        <li> L'accesso all'Area Ecologica avviene <a href = "./nuovoappuntamentocdr.php"> solo su appuntamento </a> </li>
        <li> La ricevuta stampata dovrà essere mostrata al personale all'entrata. <br> In alternativa, si può comunicare all'ingresso i propri dati anagrafici e il <b> codice prenotazione </b> </li>
        <li> <b> I rifiuti dovranno essere già separati</b>: non sarà ammesso fermarsi a differenziare i rifiuti all'interno del centro</li>
        <li> Le operazioni di scarico del rifiuto sono a cura dell'utente. <br> Il personale del centro è autorizzato a dare il proprio supporto in fase di accettazione circa le indicazioni di collocazione dei rifiuti </li>
        <li> La durata massima di <B> permanenza </b> al centro <b> non può superare i 15 minuti </b> a persona per singola prenotazione </li>
    </ul>

    <h2> Orari del centro </h2>
    <ul id="final">
        <li> Dal Lunedì al Sabato: <b> 5.00 - 19.00 </b> </li>
        <li> Domenica e festivi: <b> CHIUSO </b> </li>
    </ul>

    <?php
        require_once "./layout/footer.php"
    ?>
    </body>
</html>