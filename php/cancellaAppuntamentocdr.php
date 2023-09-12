<?php
    session_start();
    require_once "./utility/gestoreSessione.php";
    require_once "./utility/greenservicedb.php";
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Cancella Appuntamento | Green Service SpA</title>
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
        <h1> Area Ecologica </h1>
    </div>
    <h2> Cancella un appuntamento </h2>

    <?php
        $user = $_SESSION['usernamevar'];
        $result = mostraProssimiAppuntamentiUtentecdr($user);
        if($result->num_rows <> 0)
        {
            echo "<table class='tabellaphp'>
            <tr> 
                <th> Codice Prenotazione </th>
                <th> Giorno </th>
                <th> Orario </th>
                <th> Azioni </th>
            </tr> ";
        while($row = $result->fetch_assoc()) {
            $cod = $row['CodicePrenotazione'];
            $riga = "<tr>
            <td>".$row['CodicePrenotazione']."</td>
            <td>".$row['Giorno']."</td>
            <td>".$row['Orario']."</td>
            <td> <a
            onclick=\"
                var i = confirm('Confermare la cancellazione?');
                if( i == true){
                    location.href= './process/cancellaAppuntamentoProcesscdr.php?cod=$cod'; 
                }
                \"> CANCELLA </a>
            </tr>";
            echo $riga;
          }
        echo "</table>";
        }
        else
            echo "<p id='nofounderror'> Non hai prenotazioni da te effettuate </p>";
    ?>

    <?php
        require_once "./layout/footer.php"
    ?>
    </body>
</html>
