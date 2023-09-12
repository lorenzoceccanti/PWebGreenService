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
                  alert("ATTENZIONE.\nPER NON PERDERE LA COERENZA DEI DATI DELLA PRENOTAZIONE IN CORSO, si consiglia di utilizzare esclusivamente i tasti a video e non quelli del browser.\nUtilizzare i tasti AGGIUNGI per aggiungere un nuovo rifiuto e CANCELLA per cancellare un rifiuto già esistente in tabella.");
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
        require_once "./layout/footer.php";
    ?>


    </body>
</html>