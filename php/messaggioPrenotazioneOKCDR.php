<?php
  ini_set('session.cache_limiter','public');
  session_cache_limiter(false);
  session_start();
  require_once "./utility/gestoreSessione.php";
  require_once "./utility/greenservicedb.php";
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Esito OK | Green Service SpA</title>
        <meta charset="utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keyword" content = "greenservice">
        <link rel = "stylesheet"  type = "text/css" href = "../css/style.css">
        <link rel ="stylesheet" type="text/css" href="../css/styleIngombrantiNuovoAppuntamento.css">
        <link rel = "icon" href="../img/tabicon.png">
    </head>

    <body>
        <?php
            require_once "/layout/header.php";
            require_once "/layout/navbar.php";
        ?>

    <div id="logoIng">
        <h1> Area Ecologica </h1>
    </div>
        <h2 id="scrittaOK"> Appuntamento registrato </h2>

        <?php

        $result2 = mostraAnagrafica($_SESSION['usernamevar']);
        while($row2 = $result2->fetch_assoc()){
            echo "<h2 class=\"dati-anagr\"> Utente </h2>";
            echo "<div class=\"elenco-anagrafica\">";
            echo "<p> Nome: <b>".$row2['Nome']."</b></p>";
            echo "<p> Cognome: <b>".$row2['Cognome']."</b></p>";
            echo "<p> Telefono: ".$row2['Telefono']."</p>";
            echo "<p> Cellulare: <b>".$row2['Cellulare']."</b></p>";
            echo "<p> Città: <b>".$row2['Citta']."</b></p>";
            echo "<p> Indirizzo: <b>".$row2['Indirizzo']."</b></p>";
            echo "</div>";
        }
            echo "<div class='query'>";
            echo "<h2 class='dati-anagr'> Dati Prenotazione </h2>";
            $result = faiRiepilogoDatiPrenotazioneCDR();
            echo "<table class='tabellaphp'>
            <tr> 
                <th> Codice Prenotazione </th>
                <th> Giorno </th>
                <th> Orario </th>
            </tr> ";
            while($row = $result->fetch_assoc()) {
                    $riga = "<tr>
                    <td>".$row['CodicePrenotazione']."</td>
                    <td>".$row['Giorno']."</td>
                    <td>".$row['Orario']."</td>
                    </tr>";
                    echo $riga;
                $codPrenotazione = $row['CodicePrenotazione'];
            }
            echo "</table>";
            $result = faiRiepilogoDettaglioCDR($codPrenotazione);
            echo "<h2 class='dati-anagr'> Dettaglio Materiali </h2>";
            echo "<table class='tabellaphp'>
            <tr> 
                <th> Descrizione </th>
                <th> Quantità </th>
            </tr> ";
            while($row = $result->fetch_assoc()) {
                    $riga = "<tr>
                    <td>".$row['descrizione']."</td>
                    <td>".$row['quantita']."</td>
                    </tr>";
                    echo $riga;
            }
            echo "</table>";
            echo "<a id='stampa' onclick=\"window.print();\"> STAMPA PROMEMORIA </a>";
            echo "<a id='stampa' onclick=\"location.href='../index.php'\"> ESCI </a>";
            echo "</div>";
        ?>

        <?php
            require_once "/layout/footer.php"
        ?>


    </body>
</html>
        