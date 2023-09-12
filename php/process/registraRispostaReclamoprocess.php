<?php
    session_start();
    require_once "./../utility/greenservicedb.php"; 
    require_once "./../utility/gestoreSessione.php";

    $risposta = $_POST['rispostareclamoText'];
    $id = $_GET['id'];
    rispondiReclamoGestore($risposta, $id);
    header("Location: ../reclamiGestore.php");
?>