<?php
    require_once "utility/greenservicedb.php";
    require_once "utility/gestoreSessione.php";
    session_start();
?>

<?php

    if(isset($_GET['username']))
        $usernamevar = $_GET['username'];
    else
        $usernamevar = $_POST['username'];

    $result = recuperaDomandeSicurezza($usernamevar);
    if(mysqli_num_rows($result) <> 0)
    {
    while($row = $result->fetch_assoc()){
      $domanda1 = $row['domanda1'];
      $domanda2 = $row['domanda2'];
     }

    if($domanda1 == "nomeanimale")
        $domanda1 = "Qual è il nome del tuo primo animale domestico?";
    if($domanda1 == "targaprimaauto")
        $domanda1 = "Qual era la targa della tua prima auto?";
    if($domanda1 == "nomescuola")
       $domanda1 = "Qual era il nome della tua scuola elementare?";              
     if($domanda2 == "nomecitta")
       $domanda2 = "In quale città si sono conosciuti i tuoi genitori?";
     if($domanda2 == "nomealbum")
        $domanda2 = "Qual è stato il primo album che hai acquistato?";
     if($domanda2 == "nomevia")
        $domanda2 = "Qual è il nome della via in cui sei cresciuto?";
    }
    else
    {
        header("Location: ./cambioPassword.php?messaggio=ERRORE. Il nome utente indicato non esiste.");
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

        <script>
            function validateForm(){
                var pass1 = document.forms['formReg']['password'].value;
                var pass2 = document.forms['formReg']['confPassword'].value;
                
                if(pass1 === pass2)
                    return true;
                else
                    {
                        alert("Errore. Le password devono coincidere");
                        return false;
                    }
            }

        </script>
    </head>
        <body>
        
        <?php
            require_once "./layout/header.php";
            require_once "./layout/footer.php";
        ?>
        <div id="register_box">
            <?php
            echo "<form name='formRecupero1' action=\"./process/recuperoPasswordprocess.php\" method=\"post\" onsubmit=\"return validateForm();\">";
            ?>
                <label id="title">  Recupero password </label>
                <label for = "username"> Indirizzo mail (username) </label>
                <?php
                    echo "<h3 style='font-family:verdana'> $usernamevar </h3>";
                    echo "<input style='display:none' type='text' name='usernameform' id='usernameform' value=$usernamevar>";
                    echo "<label for='scritta1'> Domanda di sicurezza (n.1) </label><br><br>";
                    echo "<label for = 'domanda1'> $domanda1 </label>";
                    echo "<input type='text'name='risposta1' placeholder='Risposta..' id='risposta1' required>";
                    echo "<label for='scritta2'> Domanda di sicurezza (n.2) </label><br><br>";
                    echo "<label for = 'domanda2'> $domanda2 </label>";
                    echo "<input type='text'name='risposta2' placeholder='Risposta..' id='risposta2' required>";
                    echo "<label for = 'password'> Scegli nuova password </label>";
                    echo "<input type = 'password' pattern=\"[0-9a-zA-Z!\-#$%&'()*+,.\/:;<=>?@[\]\^_`{|}~\\]{8,}\" name='password' placeholder='Password (almeno 8 caratteri)' id='password' required>";
                    echo "<label for = 'confpassword'> Conferma nuova password </label>";
                    echo "<input type = 'password' pattern=\"[0-9a-zA-Z!\-#$%&'()*+,.\/:;<=>?@[\]\^_`{|}~\\]{8,}\" name='confpassword' placeholder='Conferma password' id='confpassword' required>";
                    echo "<button type = 'submit'> Verifica </button>";
                    echo "<button style = 'margin-left: 1%' id=\"annulla\" onclick=\"location.href='./cambioPassword.php'\"> Indietro </button>";
                ?>
            </form>
            <?php
                if(isset($_GET['errorMessage'])){
                    $error = $_GET['errorMessage'];
                    echo "<p style = 'margin-bottom: 0px;' id=\"registererror\"> $error </p>";
                }
            ?>
        </div>

        </body>
</html>