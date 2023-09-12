<?php
    require_once "utility/greenservicedb.php";
    require_once "utility/gestoreSessione.php";
    session_start();

    if(isUserLogged()){
        header('Location: ../index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <title> Registrazione utente | Green Service SpA </title>
        <meta charset="utf-8">
        <meta name="author" content="Lorenzo Ceccanti">
        <meta name="keyword" content="greenservice">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/styleRegister.css">
        <link rel = "icon" href="../img/tabicon.png">
        <script type="text/javascript" src="../js/registrationBehaviour.js">
        </script>
        <script>
            function wrongPasswordPattern(){
                alert("Errore. Rispettare il formato richiesto. \n La password deve avere: \n - Una lunghezza di almeno 8 caratteri");
            }
            
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

    <body onload="checkIfFormBlank();">
        
        <?php
            require_once "./layout/header.php";
            require_once "./layout/footer.php";
        ?>
        <div id="register_box">
            <form name="formReg" action="process/registrationprocess.php" method="post" onsubmit="return validateForm();">
                <label id="title">  Registrazione utente </label>
                <label for = "nome"> Nome </label>
                <input pattern="[a-zA-Z]{1,}" type="text" id="nome" name="nome" placeholder="Asdrubale" autofocus required>


                <label for = "cognome"> Cognome </label>
                <input pattern="[a-zA-Z]{1,}" type="text" name="cognome" placeholder="Asdrubalini" id="cognome" required>

                <label for = "cellulare"> Cellulare </label>
                <input pattern="[0-9]{1,}" type="tel" name="cellulare" placeholder="3494918885" id="cellulare" required>
                <label for = "telefono"> Telefono </label>
                <input pattern="[0-9]{1,}" type="tel" name="telefono" placeholder="0786484589" id="telefono">
                <label for = "username"> Indirizzo mail (username) </label>
                <input type="email" placeholder="ceo@asdrubalinisrls.losantos.com" name="username" id="username" required>
                <label for = "password"> Password </label>
                <!-- PASSWORD PATTERN: Almeno 8 caratteri, una maiuscola, un numero e un carattere speciale -->
                <!-- "(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" -->
                <input type = "password" pattern="[0-9a-zA-Z!\-#$%&'()*+,.\/:;<=>?@[\]\^_`{|}~\\]{8,}" name="password" placeholder="Password (almeno 8 caratteri)" id="password" required>
                <label for = "confPassword"> Conferma password </label>
                <input type = "password" pattern="[0-9a-zA-Z!\-#$%&'()*+,.\/:;<=>?@[\]\^_`{|}~\\]{8,}" name="confPassword" placeholder="Conferma password" required>
        
                <label for = "security1"> Domanda di sicurezza (n.1) </label>
                <select name="security1" id="security1" required>
                    <option style="display:none" value="" selected> scegli </option>
                    <option value="nomeanimale"> Qual è il nome del tuo primo animale domestico? </option>
                    <option value="targaprimaauto"> Qual era la targa della tua prima auto? </option>
                    <option value="nomescuola"> Qual era il nome della tua scuola elementare? </option>
                </select>

                <label for = "risposta1"> Risposta alla domanda (n.1) </label>
                <input type="text" name="risposta1" id="risposta1" placeholder="Risposta.." required>

                <label for = "security2"> Domanda di sicurezza (n.2) </label>
                <select name="security2" id="security2" required>
                    <option style="display:none" value="" selected> scegli </option>
                    <option value="nomecitta"> In quale città si sono conosciuti i tuoi genitori? </option>
                    <option value="nomealbum"> Qual è stato il primo album che hai acquistato? </option>
                    <option value="nomevia"> Qual è il nome della via in cui sei cresciuto? </option>
                </select>

                <label for = "risposta2"> Risposta alla domanda (n.2) </label>
                <input type="text" name="risposta2" id="risposta2" placeholder="Risposta.." required>

                <label for = "citta"> Città </label>
                <select name="citta" id="citta" required>
                <option style="display:none" value="" selected> scegli </option>
                    <optgroup label="Area Nord-Ovest">
                        <option value="Richman"> Richman </option>
                        <option value="Mulholland"> Mulholland </option>
                        <option value="Rodeo"> Rodeo </option>
                        <option value="VineWood"> VineWood </option>
                        <option value="Temple"> Temple </option>
                    </optgroup>
                    <optgroup label="Area Centrale e Marittima">
                        <option value="Market"> Market </option>
                        <option value="Mulholland Intersection"> Mulholland Intersection </option>
                        <option value="Downtown"> Downtown  </option>
                        <option value="Commerce"> Commerce </option>
                        <option value="Verona Beach"> Verona Beach </option>
                        <option value="Santa Maria Beach"> Santa Maria Beach </option>
                    </optgroup>
                    <optgroup label="Area Sud-Est e Portuale">
                        <option value="Conference Center"> Conference Center </option>
                        <option value="Verdant Bluffs"> Verdant Bluffs </option>
                        <option value="Los Santos International"> Los Santos International </option>
                        <option value="Ocean Docks"> Ocean Docks </option>
                    </optgroup>
                </option>
                </select>
                <label for = "indirizzo"> Indirizzo </label>
                <input type="street" name="indirizzo" placeholder="Broad Ave, 599" id="indirizzo" required>
                <button type = "submit"> Registrati </button>
            </form>

            <?php
                if(isset($_GET['errorMessage'])){
                    $error = $_GET['errorMessage'];
                    echo "<p id=\"registererror\"> $error </p>";
                }
            ?>
        </div>
    </body>
</html>
