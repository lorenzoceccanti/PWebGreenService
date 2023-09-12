<?php
    session_start();
    require_once "./utility/gestoreSessione.php";
    require_once "./utility/greenservicedb.php";
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Dettaglio | Green Service SpA</title>
        <meta charset="utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keyword" content = "greenservice">
        <link rel ="stylesheet" type="text/css" href="../css/styleIngombrantiD.css">
        <link rel = "icon" href="../img/tabicon.png">
    </head>

    <body>    
    <?php
        $cod = $_GET['cod'];
        echo"<h2> Dettaglio prenotazione #".$cod."</h2>";
        $result = visualizzaDettagliPrenotazione($cod);
        if($result->num_rows <> 0)
        {
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
        }
    ?>
    </body>
</html>