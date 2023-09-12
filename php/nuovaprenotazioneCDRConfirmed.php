<?php
  ini_set('session.cache_limiter','public');
  session_cache_limiter(false);
  session_start();
  require_once "./utility/gestoreSessione.php";
  require_once "./utility/greenservicedb.php";
?>

<?php
            $user =  $_SESSION['usernamevar'];
            $orario = $_GET['orario'];
            $data = $_GET['data'];
            registraPrenotazioneCDR($orario, $data, $user);
            $result = codiceUltimaPrenotazioneCDR();
            while($row = $result -> fetch_assoc())
            {
                $codUltimaPrenotazione = $row['nprenotazione'];
            }
            aggiungiDettagliCDR($codUltimaPrenotazione);
            dropTableAttualePrenotazioneCDR();
            header("location: ./messaggioPrenotazioneOKCDR.php");
        ?>