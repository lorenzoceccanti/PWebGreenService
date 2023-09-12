<header id="header">
    <?php
        // Prende l'ultima parte del corrente indirizzo URL e guarda se siamo alla pagina iniziale
		if(basename($_SERVER['PHP_SELF']) != "index.php")
            echo "<a href=\"../index.php\"> <img id=\"logo\" src=\"../img/logo.png\" alt=\"Logo Green Service SPA\" onclick=\"return exitPage();\"> </a>";
    ?>
</header>