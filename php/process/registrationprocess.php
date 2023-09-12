<?php
    require_once "./../utility/dbManager.php";
    require_once "./../utility/greenservicedb.php"; 

    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $cellulare = $_POST['cellulare'];
    $telefono = $_POST['telefono'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $citta = $_POST['citta'];
    $indirizzo = $_POST['indirizzo'];
    $domanda1 = $_POST['security1'];
    $risposta1 = $_POST['risposta1'];
    $domanda2 = $_POST['security2'];
    $risposta2 = $_POST['risposta2'];


    $errorMessage = checkUsername($username);
    
    if($errorMessage === null){
        addUserAccount($nome, $cognome, $cellulare, $telefono, $username, $password, $citta, $domanda1, $risposta1, $domanda2, $risposta2,$indirizzo);
        header('Location: ../riuscito.php?operazione');
    }
    else {
        header('Location: ../register.php?errorMessage='.$errorMessage);
    }

    function checkUsername($username){
        $result = accountList();
        while($account = $result->fetch_assoc()){
            if($username == $account['username'] && $username <> '')
                return "Errore. Indirizzo mail (username) già in uso";   
        }
        return null;
    }
?>