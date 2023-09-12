<?php
    session_start();
    require_once "./utility/gestoreSessione.php";
    require_once "./utility/greenservicedb.php";
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Appuntamenti | Green Service SpA</title>
        <meta charset="utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keyword" content = "greenservice">
        <link rel = "stylesheet"  type = "text/css" href = "../css/style.css">
        <link rel ="stylesheet" type="text/css" href="../css/styleIngombrantiApp.css">
        <link rel = "icon" href="../img/tabicon.png">
    </head>

    <body>
    <?php
        require_once "./layout/header.php";
        require_once "./layout/navbar.php";
    ?>

    <div id="logoIng">
        <h1> Ritiro ingombranti </h1>
    </div>
    <h2> I tuoi prossimi appuntamenti </h2>

    <?php
        $user = $_SESSION['usernamevar'];
        $stato = "DA RITIRARE";
        $result = mostraAppuntamentiUtenteIng($user, $stato);
        if($result->num_rows <> 0)
        {
            echo "<table class='tabellaphp'>
            <tr> 
                <th> Codice Prenotazione </th>
                <th> Giorno </th>
                <th> Orario </th>
                <th> Stato </th>
                <th> Azioni </th>
            </tr> ";
        while($row = $result->fetch_assoc()) {
            $cod = $row['CodicePrenotazione'];
            $riga = "<tr>
            <td>".$row['CodicePrenotazione']."</td>
            <td>".$row['Giorno']."</td>
            <td>".$row['Orario']."</td>
            <td>".$row['Stato']."</td>
            <td> <a href=\"./visualizzaDettagliAppuntamenti.php?cod=$cod\" target=\"popup\" onclick=\"window.open('./visualizzaDettagliAppuntamenti.php?cod=$cod','popup', 'width=800,height=600'); return false;\"> DETTAGLI </a>
            </tr>";
            echo $riga;
          }
        echo "</table>";
        }
        else
            echo "<p id='nofounderror'> Non hai ritiri programmati </p>";
    ?>

    <?php
        $user = $_SESSION['usernamevar'];
        $stato = "RITIRATO";
        $result = mostraAppuntamentiUtenteIng($user, $stato);
        if($result->num_rows <> 0)
        {
            echo "<h2> Ritiri effettuati </h2>";
            echo "<table class='tabellaphp'>
            <tr> 
                <th> Codice Prenotazione </th>
                <th> Giorno </th>
                <th> Orario </th>
                <th> Stato </th>
                <th> Azioni </th>
            </tr> ";
        while($row = $result->fetch_assoc()) {
            $cod = $row['CodicePrenotazione'];
            $riga = "<tr>
            <td>".$row['CodicePrenotazione']."</td>
            <td>".$row['Giorno']."</td>
            <td>".$row['Orario']."</td>
            <td>".$row['Stato']."</td>
            <td> <a href=\"./visualizzaDettagliAppuntamenti.php?cod=$cod\" target=\"popup\" onclick=\"window.open('./visualizzaDettagliAppuntamenti.php?cod=$cod','popup', 'width=800,height=600'); return false;\"> DETTAGLI </a>
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
