<?php
    require_once "utility/greenservicedb.php";
    require_once "utility/gestoreSessione.php";
    session_start();

    if(isUserLogged())
    {
        $username = $_SESSION['usernamevar'];
    }
    else
    {
        $username = '';
    }
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <title> Recupero password | Green Service SpA </title>
        <meta charset="utf-8">
        <meta name="author" content="Lorenzo Ceccanti">
        <meta name="keyword" content="greenservice">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/styleRegister.css">
    </head>
        <body>
        
        <?php
            require_once "./layout/header.php";
            require_once "./layout/footer.php";
        ?>
        <div id="register_box">
            <form name="formRecupero1" action="recuperoPasswordBackEnd.php" method="post" onsubmit="return validateForm();">
                <label id="title">  Recupero password </label>
                <label for = "username"> Indirizzo mail (username) </label>
                <?php
                echo "<input type=\"email\" placeholder=\"ceo@asdrubalinisrls.losantos.com\" name=\"username\" id=\"username\" value='$username' required>";
                ?>
                <button type = "submit"> Inserisci </button>
                <button type = "button" style = 'margin-left: 1%' onclick="location.href='./contattaci.php'"> Indietro </button>
                
            </form>
        
        <?php
            if(isset($_GET['messaggio'])){
                $error = $_GET['messaggio'];
                echo "<p id=\"registererror\"> $error </p>";
            }
        ?>
        </div>

        </body>
</html>