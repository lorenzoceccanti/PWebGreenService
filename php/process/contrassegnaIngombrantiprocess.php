<?php
    ini_set('session.cache_limiter','public');
    session_cache_limiter(false);
    session_start();
    require_once "../utility/dbManager.php";
    require_once "../utility/greenserviceDb.php";

    $cod = $_GET['cod'];
    contrassegnaIngombrantiGestore($cod);
    header("Location: ../contrassegnaIngombranti.php");
?>