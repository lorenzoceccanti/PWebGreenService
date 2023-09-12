<?php
    session_start();
    require_once "./utility/gestoreSessione.php";
    require_once "./utility/greenservicedb.php";

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
        <title> Contrassegna Appuntamento | Green Service SpA</title>
        <meta charset="utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keyword" content = "greenservice">
        <link rel = "stylesheet"  type = "text/css" href = "../css/style.css">
        <link rel ="stylesheet" type="text/css" href="../css/styleIngGest.css">
        <link rel = "icon" href="../img/tabicon.png">
    </head>

    <body>
    <?php
        require_once "./layout/headergestore.php";
        require_once "./layout/navbargestore.php";
    ?>

    <h2> Conferma ritiro ingombrante </h2>

    <?php
        $stato = "DA RITIRARE";
        $result = mostraAppuntamentiGestoreIng($stato);
        if($result->num_rows <> 0)
        {
            echo "<table class='tabellaphp'>
            <tr> 
                <th> Codice Prenotazione </th>
                <th> Giorno </th>
                <th> Orario </th>
                <th> Id Cliente </th>
                <th> Nome Cliente </th>
                <th> Cognome Cliente </th>
                <th> Cellulare Cliente </th>
                <th> Città Cliente </th>
                <th> Indirizzo Cliente </th>
                <th> Stato </th>
                <th> Azioni </th>
            </tr> ";
        while($row = $result->fetch_assoc()) {
                $cod = $row['CodicePrenotazione'];
                $riga = "<tr>
                <td>".$row['CodicePrenotazione']."</td>
                <td>".$row['Giorno']."</td>
                <td>".$row['Orario']."</td>
                <td>".$row['idutente']."</td>
                <td>".$row['NomeCliente']."</td>
                <td>".$row['CognomeCliente']."</td>
                <td>".$row['CellulareCliente']."</td>
                <td>".$row['CittaCliente']."</td>
                <td>".$row['IndirizzoCliente']."</td>
                <td>".$row['Stato']."</td>
            <td> <a
            onclick=\"
                var i = confirm('Confermare l\'\operazione?');
                if( i == true){
                    location.href= './process/contrassegnaIngombrantiprocess.php?cod=$cod'; 
                }
                \"> CONTRASSEGNA </a>
            </tr>";
            echo $riga;
          }
        echo "</table>";
        }
        else
            echo "<p id='nofounderror'> Tutti gli appuntamenti sono già stati espletati </p>";
    ?>

    <?php
        require_once "./layout/footer.php"
    ?>
    </body>
</html>
