<?php
    session_start();
    require_once "./../utility/greenservicedb.php"; 
    require_once "./../utility/gestoreSessione.php";

    $categoria = $_POST['categoria'];
    $username = $_SESSION['usernamevar'];
    $msgtext = $_POST['reclamoText'];
    insertReclamo($categoria, $msgtext, $username);
    header("Location: ../riuscito.php?operazione=reclamo");
?>