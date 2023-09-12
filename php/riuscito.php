<?php
    session_start();
    require_once "./utility/gestoreSessione.php";
?>

<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Esito OK | Green Service SpA </title>
        <meta charset = "utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "keywords" content = "rifiutario">
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/stylereclami.css">
        <link rel = "icon" href="../img/tabicon.png">

        <style>
            h2{
                text-align: center;
                background-color: rgba(221,239,182,1);
                padding: 1%;
            }
            p#redir{
                text-align: center;
                color: white;
                font-family: Verdana, sans-serif;
                font-size: 14px;
            }
            a{
                color: white;
            }
            a:hover{
                color: red;
            }
        </style>

        <script>
            window.setTimeout(function(){
            window.location.href = "../index.php";

            }, 2500);
            
        </script>
</head>

<body>
    <?php
        require_once "./layout/header.php";
        require_once "./layout/navbar.php";
    ?>

    <?php
            $var = $_GET['operazione'];
            if($var == "reclamo")
                echo "<h2> Il tuo messaggio è stato inviato </h2>";
            if($var == "anagrafica")
                echo "<h2> I dati anagrafici sono stati aggiornati </h2>";
            if($var == "register")
                echo "<h2> Il tuo account è stato registrato </h2>";
            if($var == "changepsw")
            {
                echo "<h2> La tua password è stata correttamente reimpostata </h2>";
                echo "<p id='redir'> A breve sarai rediretto alla pagina iniziale.. Altrimenti <a href = '../index.php'> clicca qui </a> </p>";
                session_destroy();
                exit;
            }
            if($var == "adminonly")
            {
                echo "<h2> Non hai i permessi per visualizzare questa pagina </h2>";
                echo "<p id='redir'> A breve sarai rediretto alla pagina iniziale.. Altrimenti <a href = '../index.php'> clicca qui </a> </p>";
                session_destroy();
                exit;
            }
        

            echo "<p id='redir'> A breve sarai rediretto alla pagina iniziale.. Altrimenti <a href = '../index.php'> clicca qui </a> </p>";
    ?>
    <?php
		require_once "./layout/footer.php";
	?>

</body>
</html>

