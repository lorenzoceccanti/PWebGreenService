<?php
    require_once "/dbManager.php";

    // RIFIUTARIO
    function ricercaRifiutario($risultatoricerca)
    {

        global $database;
        $risultatoricerca = $database -> sqlInjectionFilter($risultatoricerca);
        $query = "SELECT nome, categoria
        FROM rifiuto
        WHERE nome LIKE '{$risultatoricerca}%'
        OR sinonimo1 LIKE '{$risultatoricerca}%'
        OR sinonimo2 LIKE '{$risultatoricerca}%'
        OR sinonimo3 LIKE '{$risultatoricerca}%'";
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }


    // Aggiunge un account al DB
    function addUserAccount($nome, $cognome, $cellulare, $telefono, $username, $password, $citta, $domanda1, $risposta1, $domanda2, $risposta2,$indirizzo){
        global $database;
        $nome = $database -> sqlInjectionFilter($nome);
        $cognome = $database -> sqlInjectionFilter($cognome);
        $cellulare = $database -> sqlInjectionFilter($cellulare);
        $telefono = $database -> sqlInjectionFilter($telefono);
        $username = $database -> sqlInjectionFilter($username);
        $password = $database -> sqlInjectionFilter($password);
        $indirizzo = $database -> sqlInjectionFilter($indirizzo);
        $risposta1 = $database -> sqlInjectionFilter($risposta1);
        $risposta2 = $database -> sqlInjectionFilter($risposta2);

        $query = 'INSERT INTO utente(username,password,nome,cognome,telefono,cellulare,citta,indirizzo,domanda1,risposta1,domanda2,risposta2)
        VALUES (\''.$username.'\', \''.$password.'\', \''.$nome.'\', \''.$cognome.'\', \''.$telefono.'\', \''.$cellulare.'\', \''.$citta.'\',\''.$indirizzo.'\',\''.$domanda1.'\',\''.$risposta1.'\',\''.$domanda2.'\',\''.$risposta2.'\')';
        $database -> queryRun($query);
        $database -> closeConnection();
    }

    // Restituisce la lista di tutti gli utenti
    function accountList(){
        global $database;
        $query = 'SELECT * FROM utente';
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }

    /* SEZIONE GESTORE */

    function rispondiReclamoGestore($testo, $id)
    {
        global $database;
        $query = "UPDATE reclamo SET risposta = '$testo'
        WHERE nreclamo = '$id';";
        $database -> queryRun($query);
        $database -> closeConnection();
    }
    function filtraReclamiGestore($categoria)
    {
        global $database;
        if($categoria == "tutto")
        {
            $query = "SELECT r.nreclamo as id, DATE_FORMAT(r.istanteinvio,'%d-%m-%Y %H:%i:%s') AS IstanteInvio, r.categoria, r.testo, u.nome,
            u.cognome,u.cellulare
            FROM reclamo r INNER JOIN utente u
            ON r.username = u.username
            WHERE r.risposta IS NULL";
        }
        else
        {
            $query = "SELECT r.nreclamo AS id, DATE_FORMAT(r.istanteinvio,'%d-%m-%Y %H:%i:%s') AS IstanteInvio, r.categoria, r.testo, u.nome,
            u.cognome,u.cellulare
            FROM reclamo r INNER JOIN utente u
            ON r.username = u.username
            WHERE r.categoria = '$categoria'
            AND r.risposta IS NULL";
        }
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }
    
    function mostraProssimiAppuntamentiGestoreecdr(){
        global $database;
        $query = "SELECT D.nprenotazione AS CodicePrenotazione, DATE_FORMAT(D.data,'%d-%m-%Y') AS Giorno,
        DATE_FORMAT(D.Ora,'%H:%i') AS Orario, u.id AS idutente, u.nome AS NomeCliente, u.cognome AS CognomeCliente,
        u.Cellulare AS CellulareCliente, u.Citta AS CittaCliente, u.Indirizzo AS IndirizzoCliente
        FROM
        (
            SELECT nprenotazione, Data, username,
            Ora  FROM prenotazionecdr WHERE
            CURRENT_DATE < Data
            OR (Data = CURRENT_DATE AND Ora >= CURRENT_TIME)
            ORDER BY Data, Ora    
        )
        AS D INNER JOIN utente u
        ON D.username = u.username;";
        $result = $database -> queryRun($query);
        return $result;
    }

    function mostraAppuntamentiTrascorsiGestorecdr(){
        global $database;
        $query = "SELECT D.nprenotazione AS CodicePrenotazione, DATE_FORMAT(D.data,'%d-%m-%Y') AS Giorno,
        DATE_FORMAT(D.Ora,'%H:%i') AS Orario, u.id AS idutente, u.nome AS NomeCliente, u.cognome AS CognomeCliente,
        u.Cellulare AS CellulareCliente, u.Citta AS CittaCliente, u.Indirizzo AS IndirizzoCliente
        FROM
        (
            SELECT nprenotazione, Data, username,
            Ora  FROM prenotazionecdr WHERE
            CURRENT_DATE > Data
            OR (Data = CURRENT_DATE AND Ora < CURRENT_TIME)
            ORDER BY Data, Ora    
        )
        AS D INNER JOIN utente u
        ON D.username = u.username;";
        $result = $database -> queryRun($query);
        return $result;
    }

    function  contrassegnaIngombrantiGestore($cod){
        global $database;
        $query = "UPDATE prenotazione SET statoticket = 'RITIRATO'
        WHERE nprenotazione = '$cod';";
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }

    function mostraAppuntamentiGestoreIng($stato){
        global $database;
        $query = "SELECT p.nprenotazione AS CodicePrenotazione, DATE_FORMAT(p.data,'%d-%m-%Y') AS Giorno,
        DATE_FORMAT(p.Ora,'%H:%i') AS Orario, p.statoticket AS Stato, u.id AS idutente, u.nome AS NomeCliente, u.cognome AS CognomeCliente,
        u.Cellulare AS CellulareCliente, u.Citta AS CittaCliente, u.Indirizzo AS IndirizzoCliente
        FROM prenotazione p
        INNER JOIN utente u ON p.username = u.username WHERE
        statoticket = '$stato'
        ORDER BY Giorno, Orario;";
        $result = $database -> queryRun($query);
        return $result;
    }


    /* SEZIONE RECUPERO PASSWORD */

    function cambioPsw($username, $password)
    {
        global $database;
        $username = $database -> sqlInjectionFilter($username);
        $password = $database -> sqlInjectionFilter($password);
        $query = "UPDATE utente SET password = '$password'
        WHERE username = '$username';";
        $database -> queryRun($query);
        $database -> closeConnection();
    }

    function controllaRisposteSicurezza($username, $risposta1, $risposta2){
        global $database;
        $username = $database -> sqlInjectionFilter($username);
        $risposta1 = $database -> sqlInjectionFilter($risposta1);
        $risposta2 = $database -> sqlInjectionFilter($risposta2);
        $query = "SELECT * FROM utente WHERE username='$username' AND
        risposta1 = '$risposta1' AND risposta2 = '$risposta2';";
        $result = $database -> queryRun($query);
        return $result;
    }

    function recuperaDomandeSicurezza($user){
        global $database;
        $query = "SELECT domanda1, domanda2
        FROM utente WHERE username = '$user';";
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }


    /* SEZIONE CAMBIO ANAGRAFICA */

    // Aggiorna i dati anagrafici
    function updateAnagrafica($telefono, $cellulare, $citta, $indirizzo, $username)
    {
        global $database;
        $query = "UPDATE utente 
        SET telefono = '$telefono', cellulare = '$cellulare', citta = '$citta',
        indirizzo = '$indirizzo' WHERE username = '$username';";
        $database -> queryRun($query);
        $database -> closeConnection();

    }


    // Restituisce i dati vecchi di telefono, cellulare, citta, indirizzo
    // da far vedere a video quando l'utente starà per sostituirli
    function restituisciTelRes($user){
        global $database;
        $query = "SELECT telefono, cellulare, citta, indirizzo
        FROM utente WHERE username = '$user';";
        $result = $database -> queryRun($query);
        return $result;
    }

    /* SEZIONE RECLAMI */

    function filtraReclamiUtente($metodo, $user){
        global $database;
        if($metodo == "tutto")
        {
            $query = "SELECT DATE_FORMAT(istanteinvio,'%d-%m-%Y %H:%i:%s') AS IstanteInvio, categoria, testo, risposta
            FROM reclamo
            WHERE username = '$user'
            AND risposta IS NOT NULL";
        }
        else
        {
            $query = "SELECT DATE_FORMAT(istanteinvio,'%d-%m-%Y %H:%i:%s') AS IstanteInvio, categoria, testo, risposta
            FROM reclamo
            WHERE username = '$user'
            AND risposta IS NOT NULL
            AND categoria = '$metodo'";
        }
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }

    function insertReclamo($categoria, $msgtext, $username)
    {
        global $database;
        $msgtext = $database -> sqlInjectionFilter($msgtext);
        $query = "INSERT INTO reclamo(istanteinvio, categoria, testo, username)
        VALUES (CURRENT_TIMESTAMP(), '$categoria', '$msgtext', '$username');";
        $result = $database -> queryRun($query);
        $database -> closeConnection();
    }


    /* SEZIONE VISUALIZZAZIONE E CANCELLAZIONE AREA ECOLOGICA */


    // Funzione atta a cancellare i dettagli di un appuntamento
    function cancellaDettaglioAppuntamentoDBcdr($cod)
    {
        global $database;
        $query = "DELETE FROM dettaglioprenotazionecdr
        WHERE nprenotazione = '$cod';";
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }


    // Funzione atta a cancellare un appuntamento dal DB
    function cancellaAppuntamentoDBcdr($cod)
    {
        global $database;
        $query = "DELETE FROM prenotazionecdr
        WHERE nprenotazione = '$cod';";
        $result = $database -> queryRun($query);
        return $result;
    }

    // Funzione atta a visualizzare il dettaglio dato un numero di prenotazione
    function visualizzaDettagliPrenotazionecdr($cod)
    {
        global $database;
        $query = "SELECT descrizione, quantita
        FROM dettaglioprenotazionecdr
        WHERE nprenotazione = '$cod'
        ORDER BY descrizione ASC;";
        $result = $database->queryRun($query);
        return $result;
        $database->closeConnection();
    }

    // Funzione atta a visualizzare i prossimi appuntamenti da ritirare e non
    function mostraProssimiAppuntamentiUtentecdr($user){
        global $database;
        $query = "SELECT D.nprenotazione AS CodicePrenotazione, DATE_FORMAT(D.data,'%d-%m-%Y') AS Giorno,
        DATE_FORMAT(D.Ora,'%H:%i') AS Orario
        FROM
        (
            SELECT nprenotazione, Data,
            Ora  FROM prenotazionecdr WHERE
            username = '$user'
            AND CURRENT_DATE < Data
            OR (Data = CURRENT_DATE AND Ora >= CURRENT_TIME)
            ORDER BY Data, Ora    
        )   AS D;";
        $result = $database -> queryRun($query);
        return $result;
    }

    // Funzione atta a visualizzare i prossimi appuntamenti da ritirare e non
    function mostraAppuntamentiTrascorsiUtentecdr($user){
        global $database;
        $query = "SELECT D.nprenotazione AS CodicePrenotazione, DATE_FORMAT(D.data,'%d-%m-%Y') AS Giorno,
        DATE_FORMAT(D.Ora,'%H:%i') AS Orario
        FROM
        (
            SELECT nprenotazione, Data,
            Ora  FROM prenotazionecdr WHERE
            username = '$user'
            AND CURRENT_DATE > Data
            OR (Data = CURRENT_DATE AND Ora < CURRENT_TIME)
            ORDER BY Data, Ora    
        )   AS D;";
        $result = $database -> queryRun($query);
        return $result;
    }


    /* SEZIONE INSERIMENTO AREA ECOLOGICA */


        //Funzione che cancella tutti i record di attuale prenotazione
        function dropDBCDRActual(){
            global $database;
            $query = 'DELETE FROM attualeprenotazionecdr';
            $result = $database->queryRun($query);
        }

    // Funzione atta a riepilogare il dettaglio dell'ultima prenotazione
    function faiRiepilogoDettaglioCDR($codPrenotazione){
        global $database;
        $query = "SELECT descrizione, quantita
        FROM dettaglioprenotazionecdr
        WHERE nprenotazione = '$codPrenotazione';";
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }

    // Funzione atta a fare il riepilogo
    function faiRiepilogoDatiPrenotazioneCDR(){
        global $database;
        $query = "SELECT P.nprenotazione AS CodicePrenotazione,
        DATE_FORMAT(P.Data,'%d-%m-%Y') AS Giorno, DATE_FORMAT(P.Ora,'%H:%i') AS Orario
        FROM prenotazionecdr P
        ORDER BY P.nprenotazione DESC
        LIMIT 1";
        $result = $database -> queryRun($query);
        return $result;
    }

    // Funzione che pulisce AttualePrenotazionecdr
    function dropTableAttualePrenotazioneCDR(){
        global $database;
        $query = 'DELETE FROM attualeprenotazionecdr';
        $database -> queryRun($query);
        $database->closeConnection();
    }

    // Funzione atta ad aggiungere i dettagli dell'ultima prenotazione alla prenotazione effettuata per CDR
    function aggiungiDettagliCDR($codUltimaPrenotazione){
        global $database;
        $query = 
            "INSERT INTO dettaglioprenotazionecdr(nprenotazione,descrizione,quantita)
            SELECT '$codUltimaPrenotazione', descrizione, quantita
            FROM attualeprenotazionecdr;";
        $database -> queryRun($query);
    }

    // Funzione che recupera il codice prenotazione dell'ultima prenotazione effettuata per CDR
    function codiceUltimaPrenotazioneCDR()
    {
        global $database;
        $query = 'SELECT nprenotazione FROM prenotazionecdr
        ORDER BY nprenotazione DESC LIMIT 1;';
        $result = $database -> queryRun($query);
        return $result;
    }

    // Funzione che registra una prenotazione definitiva di CDR
    function registraPrenotazioneCDR($time, $date, $username)
    {
        global $database;
        $query1 = 'INSERT INTO prenotazionecdr(ora,data,username)
        VALUES (\''.$time.'\',\''.$date.'\',\''.$username.'\')';
        $database -> queryRun($query1);
    }

    //Funzione che restituisce la lista delle prenotazioni 
    //del giorno passato come argomento

    function returnDBPrenotazioniCDR($calendario){
        global $database;
        $query = "SELECT HOUR(P.Ora) AS Ora, MINUTE(P.Ora) AS Minuti FROM PrenotazioneCDR P
        WHERE P.Data = '$calendario'";
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }

    // Funzione atta alla cancellazione di un solo record
    // di attuale prenotazione CDR
    function pulisciDBActualCDR($descrizione){
        global $database;
        $query = 'DELETE FROM attualeprenotazionecdr
        WHERE descrizione = \''.$descrizione.'\'';
        $result = $database -> queryRun($query);
        $database -> closeConnection();
    }

    // Funzione che invia al database un nuovo record
    // di ATTUALE PRENOTAZIONE CDR
    function storeDBnewRecordCDRActual($rifiuto, $quantita){
        global $database;
        $query = 'INSERT INTO attualeprenotazionecdr(descrizione,quantita)
        VALUES (\''.$rifiuto.'\',\''.$quantita.'\')';
        $database -> queryRun($query);
    }

    // Funzione che raccoglie tutti i rifiuti da area ecologica
    // e li infila nel menu' a tendina
    function getCdRList(){
        global $database;
        $query = 'SELECT * FROM rifiuto WHERE categoria = "AREA ECOLOGICA";';
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }

     //Funzione che restiuisce i record di attuale prenotazione
     //PER CDR
     function returnDBCDRActual(){
        global $database;
        $query2 = 'SELECT * FROM attualeprenotazionecdr;';
        $result2 = $database->queryRun($query2);
        return $result2;
    }

    
    /* SEZIONE VISUALIZZA E CANCELLA INGOMBRANTI */

    // Funzione atta a cancellare i dettagli di un appuntamento
    function cancellaDettaglioAppuntamentoDB($cod)
    {
        global $database;
        $query = "DELETE FROM dettaglioprenotazione
        WHERE nprenotazione = '$cod';";
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }


    // Funzione atta a cancellare un appuntamento dal DB
    function cancellaAppuntamentoDB($cod)
    {
        global $database;
        $query = "DELETE FROM prenotazione
        WHERE nprenotazione = '$cod';";
        $result = $database -> queryRun($query);
        return $result;
    }

    // Funzione atta a visualizzare il dettaglio dato un numero di prenotazione
    function visualizzaDettagliPrenotazione($cod)
    {
        global $database;
        $query = "SELECT descrizione, quantita
        FROM dettaglioprenotazione
        WHERE nprenotazione = '$cod'
        ORDER BY descrizione ASC;";
        $result = $database->queryRun($query);
        return $result;
        $database->closeConnection();
    }

    // Funzione atta a visualizzare gli appuntamenti da ritirare e non
    function mostraAppuntamentiUtenteIng($user, $stato){
        global $database;
        $query = "SELECT nprenotazione AS CodicePrenotazione, DATE_FORMAT(data,'%d-%m-%Y') AS Giorno,
        DATE_FORMAT(Ora,'%H:%i') AS Orario, statoticket AS Stato FROM prenotazione WHERE
        username = '$user' AND statoticket = '$stato'
        ORDER BY Giorno, Orario;";
        $result = $database -> queryRun($query);
        return $result;
    }

    /* SEZIONE INSERIMENTO APPUNTAMENTO INGOMBRANTI */

    // Funzione atta a mostrare i dati dell'utente
    function mostraAnagrafica($user)
    {
        global $database;
        $query = "SELECT Nome, Cognome, Telefono, Cellulare, Citta, Indirizzo
        FROM utente
        WHERE username='$user'";
        $result = $database -> queryRun($query);
        return $result;
    }

    // Funzione atta a riepilogare il dettaglio dell'ultima prenotazione
    function faiRiepilogoDettaglioIngombranti($codPrenotazione){
        global $database;
        $query = "SELECT descrizione, quantita
        FROM dettaglioprenotazione
        WHERE nprenotazione = '$codPrenotazione';";
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }

    // Funzione atta a fare il riepilogo
    function faiRiepilogoDatiPrenotazione(){
        global $database;
        $query = "SELECT P.nprenotazione AS CodicePrenotazione,
        DATE_FORMAT(P.Data,'%d-%m-%Y') AS Giorno, DATE_FORMAT(P.Ora,'%H:%i') AS Orario
        FROM prenotazione P
        ORDER BY P.nprenotazione DESC
        LIMIT 1";
        $result = $database -> queryRun($query);
        return $result;
    }


    // Funzione che pulisce AttualePrenotazione
    function dropTableAttualePrenotazione(){
        global $database;
        $query = 'DELETE FROM attualeprenotazione';
        $database -> queryRun($query);
        $database->closeConnection();
    }

    // Funzione atta ad aggiungere i dettagli dell'ultima prenotazione alla prenotazione effettuata
    function aggiungiDettagliIngombranti($codUltimaPrenotazione){
        global $database;
        $query = 
            "INSERT INTO dettaglioprenotazione(nprenotazione,descrizione,quantita)
            SELECT '$codUltimaPrenotazione', descrizione, quantita
            FROM attualeprenotazione;";
        $database -> queryRun($query);
    }

    // Handler che cancella ad hoc dei record che non hanno senso di esistere
    function handlePrenotazioneIngombrante($orario, $data){
        global $database;
        $query = "DELETE FROM prenotazione WHERE data='$data'
        AND ora='$orario';";
        $result = $database -> queryRun($query);
    }

    // Funzione che recupera il codice prenotazione dell'ultima prenotazione effettuata
    function codiceUltimaPrenotazione()
    {
        global $database;
        $query = 'SELECT nprenotazione FROM prenotazione
        ORDER BY nprenotazione DESC LIMIT 1;';
        $result = $database -> queryRun($query);
        return $result;
    }

    // Funzione che registra una prenotazione definitiva di Ingombrante
    function registraPrenotazioneIngombrante($time, $date, $username)
    {
        global $database;
        $stato = "DA RITIRARE";
        $query1 = 'INSERT INTO prenotazione(ora,data,username,statoticket)
        VALUES (\''.$time.'\',\''.$date.'\',\''.$username.'\', \''.$stato.'\')';
        $database -> queryRun($query1);
    }

    //Funzione che restituisce la lista delle prenotazioni 
    //del giorno passato come argomento

    function returnDBPrenotazioni($calendario){
        global $database;
        $query = 'SELECT HOUR(P.Ora) AS Ora FROM Prenotazione P
        WHERE P.Data = \''.$calendario.'\'';
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }


    // Funzione atta alla cancellazione di un solo record
    // di attuale prenotazione
    function pulisciDBActual($descrizione){
        global $database;
        $query = 'DELETE FROM attualeprenotazione
        WHERE descrizione = \''.$descrizione.'\'';
        $result = $database -> queryRun($query);
        $database -> closeConnection();
    }

    // Funzione che calcola il valore ingombro per i record
    // di attuale prenotazione
    function calcolaValoreIngombroActual(){
        global $database;
        $query = 'SELECT SUM((AP.Quantita*VI.Valore)) AS valore
        FROM AttualePrenotazione AP INNER JOIN ValoreIngombro VI
        ON AP.Descrizione = VI.Rifiuto;';
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }    

    //Funzione che cancella tutti i record di attuale prenotazione
    function dropDBIngombrantiActual(){
        global $database;
        $query = 'DELETE FROM attualeprenotazione';
        $result = $database->queryRun($query);
    }

    //Funzione che restiuisce i record di attuale prenotazione
    function returnDBIngombrantiActual(){
        global $database;
        $query2 = 'SELECT * FROM attualeprenotazione;';
        $result2 = $database->queryRun($query2);
        return $result2;
    }

    // Funzione che invia al database un nuovo record
    // di ATTUALE PRENOTAZIONE
    function storeDBnewRecordIngombrantiActual($rifiuto, $quantita){
        global $database;
        $query = 'INSERT INTO attualeprenotazione(descrizione,quantita)
        VALUES (\''.$rifiuto.'\',\''.$quantita.'\')';
        $database -> queryRun($query);
    }

    // Funzione che raccoglie tutti i possibili Ingombranti prenotabili
    // e li infila nel menu' a tendina
    function getIngombrantiList(){
        global $database;
        $query = 'SELECT * FROM rifiuto WHERE categoria = "INGOMBRANTI";';
        $result = $database -> queryRun($query);
        return $result;
        $database -> closeConnection();
    }
?>

