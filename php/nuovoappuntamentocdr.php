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
        <title> Nuovo Appuntamento | Green Service SpA</title>
        <meta charset="utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keyword" content = "greenservice">
        <link rel = "stylesheet"  type = "text/css" href = "../css/style.css">
        <link rel ="stylesheet" type="text/css" href="../css/styleIngombrantiNuovoAppuntamento.css">
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

    <h2> Nuovo appuntamento </h2>
    <div id="nuovoInizioIngombranti">
    <h3> Selezionare il tipo di rifiuto e aggiungere i materiali con il pulsante 'AGGIUNGI' </h3>

    <form class="aggiuntaRecord" action="nuovoAppuntamentocdrBackEnd.php?provenienza=normale" method="post">
    <label for = "rifiuto"> Rifiuto </label>
    <select name="rifiuto" id="rifiuto" required>
    <option style="display:none" value="" disabled selected> scegli </option>
    <?php 
        $result = getCdRList();
        while($rows = $result->fetch_assoc()){
        ?>
        <option value="<?php echo $rows['nome'];?>"> <?php echo $rows['nome'];?> </option>
        <?php
        }
        ?>
    </select>
    <label for="quantita"> Quantità </label>
    <input type="number" id="quantita" name="quantita" min="1" value="1">
    <input type="submit" name="submitnewrifiuto" value="AGGIUNGI">
    </form>
    </div>
    
    <?php

        dropDBCDRActual();
        $result = returnDBCDRActual();
        if(mysqli_num_rows($result)==0)
            echo "<h3> La lista è vuota. Premere il pulsante 'AGGIUNGI' se vuoi aggiungere i materiali </h3>";
        else
        {
            echo "<table class='tabellaphp'>
            <tr> 
                <th> Descrizione </th>
                <th> Quantità </th>
            </tr> ";
            while($rows = $result->fetch_assoc()){
                $riga = "<tr>
                <td>".$rows['descrizione']."</td>
                <td>".$rows['quantita']."</td>
                </tr>";
                
                echo $riga;
            }
            echo "</table>";
        }


        require_once "./layout/footer.php";
    ?>
    </body>
</html>