<?php 
    require_once "../utility/dbManager.php";
    require_once "../utility/greenserviceDb.php";
    require_once "../utility/gestoreSessione.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $location = $_GET['processBaseName'];
    $errorMessage = login($username, $password);
    if($errorMessage === null)
    {
        if($_SESSION['usernamevar'] === "master@greenservicespa.com")
        {
            header('location: ./../gestione.php');
        }
        else
        {
            header('location: '.$location);
        }
            
    }
    else
            header('location: ./../login.php?errorMessage=' . $errorMessage.'&baseName=' .$location);
    

    function login($username, $password)
    {
        if($username !== null && $password !== null)
        {
            $result = checkUser($username, $password);
            if(mysqli_num_rows($result) == 1)
            {
                session_start();
                $utente = $result -> fetch_assoc();
                $userId = $utente['id'];
                setSession($userId, $username);
                return null;
            }
            else
                return "Errore di login. Username e/o password scorretti.";
        }
    }


    function checkUser($username, $password)
    {
        global $database;
        $username = $database -> sqlInjectionFilter($username);
        $password = $database -> sqlInjectionFilter($password);

        $queryText = "SELECT * FROM UTENTE WHERE username='" .$username. "' AND password = '".$password."';";
        $result = $database->queryRun($queryText);
        $numRows = mysqli_num_rows($result);
        if($numRows != 1)
            return -1;
        $database -> closeConnection();
        return $result;
    }