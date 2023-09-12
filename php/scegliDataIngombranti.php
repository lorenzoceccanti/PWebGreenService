
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
                  alert("ATTENZIONE.\nPER NON PERDERE LA COERENZA DEI DATI DELLA PRENOTAZIONE IN CORSO, SI CONSIGLIA DI NON AVVALERSI DEI TASTI DEL BROWSER");
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
    
    <div id="formsceltadata">
    <h3> Scegliere una data </h3>
    <form action="./scegliDataIngombranti.php" method="post">
      <label for="calendar"> Scegli: </label>
      <input type="date" id="calendar" name="calendar" min="<?php echo date('Y-m-d');?>" required oninvalid="this.setCustomValidity('INSERIRE UNA DATA!');" oninput="this.setCustomValidity('');">
      <input type = "submit" value="CERCA DISPONIBILITÀ">
      <p class="ffox"> Rilevato Firefox. Il formato della data visualizzato nel box è: "MESE-GIORNO-ANNO" </p>
    </form>
    </div>

    <?php
        stampaOrari();
    ?>
    <?php
        require_once "./layout/footer.php";
    ?>


<?php
  function stampaOrari(){
    $calendar = $_POST['calendar'];
    $result = returnDBPrenotazioni($calendar);
    if(mysqli_num_rows($result)==0)
    {
        $nostampa = array();
        $ngiri = 0;
        stampaAppuntamentiLiberi($nostampa,$ngiri, $calendar);
    }
    else
    {
        $nostampa = array();
        while($row = $result -> fetch_assoc())
        {
            $nostampa[] = $row['Ora'];
        }
        $ngiri = mysqli_num_rows($result);
        stampaAppuntamentiLiberi($nostampa, $ngiri, $calendar);
    }
  }
    
function stampaAppuntamentiLiberi($nostampa, $ngiri, $calendar){
    // time: 0 == ore 00
    // time: 60 == ore 01
    // ecc
    // time: 300 == ore 05.00
    // ecc
    // time: 1140 == ore 19
    // static ?
    $dataout = date_create($calendar);
    $date = date_format($dataout, "m/d/Y");
    $giornoStr = date_format($dataout, "d/m");
    $calendarString = date('Y-m-d', strtotime($date));
    echo "<h3 id=\"h3blue\"> Orari disponibili per il giorno ".date_format($dataout, "d/m/Y")." </h3>";
    echo "<h3 id=\"h3bluemin\"> Si ricorda che è necessario confermare la prenotazione almeno 1h prima dell'appuntamento </h3>";
    echo "<p id=\"pbluemin\"> Esempio: per confermare la prenotazione alle 13.00, va data conferma entro le ore 11.59 </p>";
    echo "<ul class=\"flex-container\">";
    $nomeday = date("l", strtotime($date));
    $giornoOut = date("d", strtotime($date));
    $meseOut = date("m", strtotime($date));
    $annoOut = date("Y", strtotime($date));
    $oraAttuale = date("H");
    $minutiAttuale = date("i");
    $timestampOut = date("d.m.Y",mktime($oraAttuale,$minutiAttuale,0,$meseOut,$giornoOut,$annoOut));
    $stessoGiorno = 0;
    $giornoPrecedente = 0;
    if($timestampOut === date("d.m.Y"))
    {
        $stessoGiorno = 1;
    }
    $orarioErr = 0;
    if(date("H:i") > "18.00" and $stessoGiorno == 1)
    {
        echo "<p id=\"nofounderror\"> Nessun orario disponibile </p>";
        return null;
    }

    if(count($nostampa) < 15 and $nomeday !== "Sunday" and calcolaFestivitaItaliane($giornoStr) == 0) // Qui inserire l'eccezione sui festivi
    {
        $tempoIniziale = 0;
        if($stessoGiorno == 1)
        {
            $tempoIniziale = 120 + ($oraAttuale * 60);
        }
        else
        {
            $tempoIniziale = 300;
        }

        for($time = $tempoIniziale ; $time <= 1140; $time = $time + 60)
        {
            $ore = $time / 60;
            for($i=0; $i < $ngiri; $i++)
            {
                if($ore == $nostampa[$i])
                {
                    continue 2;
                }
            }
                echo "<li class=\"flex-item\" onclick=\"
                var i = confirm('Si conferma la scelta effettuata?');
                if( i == true){
                    location.href= './nuovaprenotazioneIngombrantiConfirmed.php?orario=$ore:00&data=$calendarString'; 
                }
                \">".($ore).".00</li>";
        }
        echo "</ul>";
    }
    else
    {
        echo "<p id=\"nofounderror\"> Nessun orario disponibile </p>";
    }
}
function calcolaFestivitaItaliane($giornostr){
    if($giornostr == "01/01" or $giornostr == "06/01" or $giornostr == "25/04" or $giornostr == "01/05"
    or $giornostr == "02/06" or $giornostr == "15/08" or $giornostr == "01/11" or $giornostr == "08/12"
    or $giornostr == "25/12" or $giornostr == "26/12")
    {
         return 1;
    }
    else
        return 0;
}
?>