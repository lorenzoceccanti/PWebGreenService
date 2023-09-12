<header id="header">
    <?php
        // Prende l'ultima parte del corrente indirizzo URL e guarda se siamo alla pagina iniziale
		if(basename($_SERVER['PHP_SELF']) != "gestione.php")
            echo "<a href=\"gestione.php\"> <img id=\"logo\" src=\"../img/logo.png\" alt=\"Logo Green Service SPA\" onclick=\"return exitPage();\"> </a>";
    ?>
</header>