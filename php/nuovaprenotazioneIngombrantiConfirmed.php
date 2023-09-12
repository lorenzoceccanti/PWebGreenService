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
            handlePrenotazioneIngombrante($orario, $data); // non possono esistere 2 prenotazioni lo stessa data e ora
            registraPrenotazioneIngombrante($orario, $data, $user);
            $result = codiceUltimaPrenotazione();
            while($row = $result -> fetch_assoc())
            {
                $codUltimaPrenotazione = $row['nprenotazione'];
            }
            aggiungiDettagliIngombranti($codUltimaPrenotazione);
            dropTableAttualePrenotazione();
            header("location: ./messaggioPrenotazioneOK.php");
        ?>