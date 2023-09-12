<?php
    session_start();
    require_once "./utility/gestoreSessione.php";
    require_once "./utility/greenservicedb.php";

   /* if(isUserLogged())
    {
        header("Location: ../index.html");
        exit;
    }*/
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
    <title> Accedi | Green Service SpA</title>
    <meta charset="utf-8">
    <meta name = "author" content = "Lorenzo Ceccanti">
    <meta name = "keyword" content = "greenservice">
    <link rel = "stylesheet"  type = "text/css" href = "../css/style.css">
    <link rel = "stylesheet"  type = "text/css" href = "../css/styleLogin.css">
    <link rel = "icon" href="../img/tabicon.png">
    </head>

    <body>
        <?php
            require_once "./layout/header.php"
        ?>

        <?php
            if(isset($_GET['baseName'])){
                $baseName = $_GET['baseName'];
            }

        echo "<div id = \"login_box\">";
        echo "<form id=\"form_login\" action = \"./process/loginprocess.php?processBaseName=$baseName\" method=\"post\">";
        ?>
                <label> <h2> Area riservata </h2> </label>
                <h3> Per accedere è necessario autenticarsi con nome utente e password </h3>
                <input type = "text" placeholder = "Username" name = "username" required autofocus>
                <input type = "password" placeholder = "Password" name = "password" required>
                <button type = "submit"> Accedi </button>
            </form>
            <p> Non sei ancora registrato? <a href="./register.php"> Registrati </a> </p>
            <p> Hai dimenticato la password? Clicca <a href="./cambioPassword.php"> qui </a> </p>
            
        <?php
            if(isset($_GET['errorMessage'])){
                $error = $_GET['errorMessage'];
                echo "<p id=\"autherror\"> $error </p>";
            }
        ?>

        </div>

    <?php
        require_once "./layout/footer.php"
    ?>
    </body>
</html>
