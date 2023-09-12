<?php
    ini_set('session.cache_limiter','public');
    session_cache_limiter(false);
    session_start();
    require_once "../utility/dbManager.php";
    require_once "../utility/greenserviceDb.php";

    $descrizione = $_GET['descrizione'];
    pulisciDBActual($descrizione);
    echo $descrizione;
    header("Location: ../nuovoAppuntamentoIngombrantiBackEnd.php?provenienza=cancellazione");
?>