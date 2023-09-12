<?php

    // Creazione delle variabili di sessione
    // La sessione inizia quando l'utente fa login
    function setSession($idutente, $username){
        $_SESSION['idvar'] = $idutente;
        $_SESSION['usernamevar'] = $username;
    
    }
    
    // Controlla se l'utente ha fatto login. Se si restituisce il nome dell'utente
    function isUserLogged(){
        // Se nella variabile di sessione 'idutente' c'è scritto qualcosa
        // significa che l'utente ha fatto login
        if(isset($_SESSION['idvar']))
            return $_SESSION['usernamevar'];
        else
            return false;
    }

    function isAdminLoggedIn(){
        if(isset($_SESSION['idvar']) && $_SESSION['usernamevar'] === 'master@greenservicespa.com')
            return true;
        else
            return false;
    }

?>