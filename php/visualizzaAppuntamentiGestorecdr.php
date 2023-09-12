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
        <title> Gestione Appuntamenti | Green Service SpA</title>
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

    <div id="logoIng">
        <h1> Gestione Area Ecologica </h1>
    </div>
    <h2> Prossimi arrivi</h2>

    <?php
        $result = mostraProssimiAppuntamentiGestoreecdr();
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
            <td> <a href=\"./visualizzaDettagliAppuntamenticdr.php?cod=$cod\" target=\"popup\" onclick=\"window.open('./visualizzaDettagliAppuntamenticdr.php?cod=$cod','popup', 'width=800,height=600'); return false;\"> DETTAGLI </a>
            </tr>";
            echo $riga;
          }
        echo "</table>";
        }
        else
            echo "<p id='nofounderror'> Non hai arrivi programmati </p>";
    ?>

    <?php
        $result = mostraAppuntamentiTrascorsiGestorecdr();
        if($result->num_rows <> 0)
        {
            echo "<h2> Arrivi trascorsi </h2>";
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
            <td> <a href=\"./visualizzaDettagliAppuntamenticdr.php?cod=$cod\" target=\"popup\" onclick=\"window.open('./visualizzaDettagliAppuntamenticdr.php?cod=$cod','popup', 'width=800,height=600'); return false;\"> DETTAGLI </a>
            </tr>";
            echo $riga;
          }
        echo "</table>";
        }
    ?>

    <?php
        require_once "./layout/footer.php"
    ?>
    </body>
</html>
