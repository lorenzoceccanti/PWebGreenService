<?php
    session_start();
    require_once "./utility/gestoreSessione.php";
    require_once "./utility/greenservicedb.php";

    if(!isUserLogged())
    {
        $baseName = ($_SERVER['PHP_SELF']);
        header("Location: ./login.php?baseName=$baseName");
    }
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Risposte Reclami | Green Service SpA</title>
        <meta charset="utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keyword" content = "greenservice">
        <link rel = "stylesheet"  type = "text/css" href = "../css/style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/stylecambioanagrafica.css">
        <link rel ="stylesheet" type="text/css" href="../css/styleIngGest.css">
        <link rel = "icon" href="../img/tabicon.png">
    </head>

    <body>
    <?php
        require_once "./layout/header.php";
        require_once "./layout/navbar.php";

      
    ?>

    <h3> Risposte reclami </h3>

    <div id="box">
    <form name="formReclamiRisposte" id="formReclamiRisposte" action="visualizzaReclamiUtente.php" method="get">
    <label for="catFiltro"> Filtra per categoria </label>
    <select name="catFiltro" id="catFiltro" required>
        <option selected value="tutto"> TUTTE LE CATEGORIE </option>
        <option value="mancatoritiropap"> MANCATO RITIRO PORTA A PORTA </option>
        <option value="mancatoritiroingombranti"> MANCATO RITIRO INGOMBRANTI </option>
        <option value="smarrimentocontenitore"> SMARRIMENTO CONTENITORE </option>
        <option value="dichiarazionepositivitacovid-19"> DICHIARAZIONE POSITIVITA' COVID-19 </option>
        <option value="altro"> ALTRO (rifiuto non conforme al rifiutario, assenza di orari disponibili, mancata risposta e-mail, domande non frequenti, ecc) </option>
        <input type = "submit" class="submitbutton" value="Filtra"> 
    </select>
    </form>
    </div>

    <?php
              if(isset($_GET['catFiltro']))
              {
                  $metodo = $_GET['catFiltro'];
                  $result = filtraReclamiUtente($metodo, $_SESSION['usernamevar']);
                  if($result->num_rows <> 0)
                    {
                        echo "<table class='tabellaphp'>
                        <tr> 
                            <th> Istante Invio </th>
                            <th> Categoria Reclamo </th>
                            <th> Testo </th>
                            <th> Risposta </th>
                        </tr> ";
                  while($row = $result->fetch_assoc()) {
                    $categoria = $row['categoria'];
                    if($categoria == "mancatoritiropap")
                    {
                        $categoria = "MANCATO RITIRO PORTA A PORTA";
                    }
                    else if($categoria == "mancatoritiroingombranti")
                    {
                        $categoria = "MANCATO RITIRO INGOMBRANTI";
                    }
                    else if($categoria == "smarrimentocontenitore")
                    {
                        $categoria = "SMARRIMENTO CONTENITORE";
                    }
                    else if($categoria == "dichiarazionepositivitacovid-19")
                    {
                        $categoria = "DICHIARAZIONE POSITIVITA' COVID-19";
                    }
                    else{
                        $categoria = "ALTRO";
                    }
                    $riga = "<tr>
                    <td>".$row['IstanteInvio']."</td>
                    <td>".$categoria."</td>
                    <td>".$row['testo']."</td>
                    <td>".$row['risposta']."</td>
                    </tr>";
                    echo $riga;
                  }
                echo "</table>";
                }
                else
                    echo "<p id='nofounderror'> Non hai alcuna risposta appartenente a questa categoria </p>";
              }
    ?>

<?php
        require_once "./layout/footer.php"
    ?>
    </body>
</html>
