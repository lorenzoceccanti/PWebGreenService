<nav id = "navbar" onclick="return exitPage();">
    <?php
        if(basename($_SERVER['PHP_SELF']) == "index.php")
            $path = "php"; // Se siamo in index bisogna scendere alla sottocartella dedicata al php
        else
            $path = "."; // Altrimenti se siamo in una qualsiasi altra pagina per come abbiamo impostato le pagine
                        // saremo per forza nella stessa cartella contente il file login.php

        if(!isUserLogged())
        {
            $baseName = ($_SERVER['PHP_SELF']);
            // Se non ha fatto il login metto il bottone per il LOGIN
            echo "<div class=\"usersession\">";

            // Per evitare caos nel rifiutario
            if(basename($_SERVER['PHP_SELF']) == "rifiutarioBackend.php")
            {
                $baseName = "../rifiutario.php";
                echo "<a href = \"$path/login.php?baseName=$baseName\" class = \"link\"> LOGIN </a>";
            }
            // Per evitare caos in ingombranti
            else if(basename($_SERVER['PHP_SELF']) == "nuovoAppuntamentoIngombrantiBackEnd.php")
            {
                $baseName = "../nuovoAppuntamentoIngombranti.php";
                echo "<a href = \"$path/login.php?baseName=$baseName\" class = \"link\"> LOGIN </a>";
            }
            else
                echo "<a href = \"$path/login.php?baseName=$baseName\" class = \"link\"> LOGIN </a>";
            ?>
           
            <a id="nocol"> 
                <span id="orario"> <?php
            echo date(" d.". "m.". "Y ". "H:i:s"); ?> </span>
            </a>
            <?php
            echo "<a id=\"nocol\"> Benvenuto </a>";
            echo "</div>";
        }
        else
        {
            // Stampo username e il bottone per il LOGOUT
            echo "<div class=\"usersession\">";
            echo "<a href = \"$path/process/logoutprocess.php\" class = \"link\"> LOGOUT </a>";
            if($_SESSION['usernamevar'] <> "master@greenservicespa.com")
                echo "<a id=\"nocol\"> Bentornato " .$_SESSION['usernamevar']. "</a>";
            else
                echo "<a id=\"nocol\"> MODALITÀ GESTORE </a>";
            echo "</div>";
        }


        if(basename($_SERVER['PHP_SELF']) != "index.php")
        {
            echo"<a href = \"portaporta.php\" class=\"link\"> CALENDARIO </a>";
            echo"<a href = \"../php/rifiutario.php\" class=\"link\"> RIFIUTARIO </a>";
            echo"<a href = \"../php/ingombranti.php\" class=\"link\"> INGOMBRANTI </a>";
            echo"<a href = \"../php/cdr.php\" class = \"link\"> AREA ECOLOGICA </a>";
            echo"<a href = \"../php/contattaci.php\" class = \"link\"> FAQ </a>";
            echo "<a href = \"../html/about.html\" class = \"link\"> ABOUT </a>";
        }
    ?>
</nav>
