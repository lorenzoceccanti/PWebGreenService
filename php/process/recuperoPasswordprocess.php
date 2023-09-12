<?php 
    require_once "../utility/dbManager.php";
    require_once "../utility/greenserviceDb.php";
    require_once "../utility/gestoreSessione.php";

    $username = $_POST['usernameform'];
    $risposta1 = $_POST['risposta1'];
    $risposta2 = $_POST['risposta2'];
    $password = $_POST['password'];
    $result = controllaRisposteSicurezza($username, $risposta1, $risposta2);

    $errorMesage = 'errore';
    $tentativo = 0;
    if(mysqli_num_rows($result) == 1)
    {
        // Cambia password
        echo $username;
        echo $password;
        cambioPsw($username, $password);
        header('location: ../riuscito.php?operazione=changepsw');
    }
    else
    {
        header('location: ../recuperoPasswordBackEnd.php?errorMessage=Verifica con domanda di sicurezza fallita&username=' .$username);
    }
?>