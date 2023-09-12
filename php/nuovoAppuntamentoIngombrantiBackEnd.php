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

    <script>
        function exitPage(){
        if(!confirm("ATTENZIONE. Si sta per lasciare la pagina. Eventuali prenotazioni in sospeso saranno cancellate. Continuare?")){
          return false;
        }
      }

      function mouseisLeaving(){
          var mouseY = 0;
          var topValue = 0;
          window.addEventListener("mouseout", function(e){
              mouseY = e.clientY;
              if(mouseY < topValue){
                  alert("ATTENZIONE. \nPER NON PERDERE LA COERENZA DEI DATI DELLA PRENOTAZIONE IN CORSO, si consiglia di utilizzare esclusivamente i tasti a video e non quelli del browser.\nUtilizzare i tasti AGGIUNGI per aggiungere un nuovo rifiuto e CANCELLA per cancellare un rifiuto già esistente in tabella.");
              }
            }, false);
      }

    </script>


    <body onload="return mouseisLeaving();">
    <?php
        require_once "./layout/header.php";
        require_once "./layout/navbar.php";
    ?>

    <div id="logoIng">
        <h1> Ritiro ingombranti </h1>
    </div>
    <h2> Nuovo appuntamento </h2>
    <div id="nuovoInizioIngombranti">
    <h3> Selezionare il tipo di rifiuto e aggiungere i materiali con il pulsante AGGIUNGI </h3>

    <form class="aggiuntaRecord" action="nuovoAppuntamentoIngombrantiBackEnd.php?provenienza=normale" method="post">
    <label for = "rifiuto"> Rifiuto </label>
    <select name="rifiuto" id="rifiuto" required>
    <option style="display:none" value="" disabled selected> scegli </option>
    <?php 
        $result = getIngombrantiList();
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
         
        $provenienza = $_GET['provenienza'];
        if($provenienza !== "cancellazione")
        {
            $rifiuto = $_POST['rifiuto'];
            $quantita = $_POST['quantita'];
            storeDBnewRecordIngombrantiActual($rifiuto, $quantita);
        }

        
        $result = returnDBIngombrantiActual();
        if(mysqli_num_rows($result)==0)
            echo "<h3> La lista è vuota. Premere il pulsante AGGIUNGI se vuoi aggiungere i materiali </h3>";
        else
        {
            echo "<table class='tabellaphp'>
            <tr> 
                <th> Descrizione </th>
                <th> Quantità </th>
                <th> Azioni </th>
            </tr> ";
            while($rows = $result->fetch_assoc()){
                $riga1 = "<tr>
                <td>".$rows['descrizione']."</td>
                <td>".$rows['quantita']."</td>";
                $descrizione = $rows['descrizione'];
                $riga2 = 
                "
                <td> <a class=\"button\" href=\"./process/cancellaIngombranteProcess.php?descrizione=$descrizione\"> CANCELLA </a> </td>
                </tr>";
                
                echo $riga1;
                echo $riga2;
            }
            echo "</table>";
            $result = calcolaValoreIngombroActual();
            echo "<div class=\"nextb1\">";
            while($row = $result -> fetch_assoc()){
                echo "<p> Valore ingombro: ".$row['valore']."</p>";
                $valingombro = $row['valore'];
            }
            if($valingombro > 10)
            {
                echo "<p id=\"error\"> ERRORE: Impossibile prenotare. Valore Ingombro non deve superare 10 </p>";
            }
            else
            {
                echo "<a class=\"button\" href=\"nuovoAppuntamentoIngombrantiBackEnd2.php\"> PROSEGUI </a>";
            }
            echo "</div>";
        }
    ?>
    <?php
        require_once "./layout/footer.php";
    ?>
    </body>
</html>