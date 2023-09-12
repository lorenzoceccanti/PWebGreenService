<?php
    session_start();
    require_once "./../utility/greenservicedb.php"; 
    require_once "./../utility/gestoreSessione.php";

    $telefono = $_POST['telefono'];
    $cellulare = $_POST['cellulare'];
    $citta = $_POST['citta'];
    $indirizzo = $_POST['indirizzo'];
    $username = $_SESSION['usernamevar'];

    // Recupero i vecchi dati
    $result = restituisciTelRes($username);
        while($row = $result->fetch_assoc())
        {
            $cittavecchia = $row['citta'];
            $indirizzovecchio = $row['indirizzo'];
        }
    if($citta == "nonscelto" and $indirizzo <> "non sovrascrivere se invariato")
    {
        updateAnagrafica($telefono, $cellulare, $cittavecchia, $indirizzo, $username);
    }
    else if($indirizzo == "non sovrascrivere se invariato" and $citta <> "nonscelto")
    {
        updateAnagrafica($telefono, $cellulare, $citta, $indirizzovecchio, $username);
    }
    else if($citta == "nonscelto" and $indirizzo == "non sovrascrivere se invariato")
    {
        updateAnagrafica($telefono, $cellulare, $cittavecchia, $indirizzovecchio, $username);
    }
    else{
        updateAnagrafica($telefono, $cellulare, $citta, $indirizzo, $username);
    }
    header("Location: ../riuscito.php?operazione=anagrafica");

?>