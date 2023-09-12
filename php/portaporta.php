<?php
    session_start();
    require_once "./utility/gestoreSessione.php";

    if(isUserLogged() && isAdminLoggedIn())
    {
        header("Location: ./gestione.php");
    }
?>
<!DOCTYPE html>
<html lang = "it">
    <head>
        <title> Calendario | Green Service SpA </title>
        <meta charset = "utf-8">
        <meta name = "author" content = "Lorenzo Ceccanti">
        <meta name = "description" content = "Guida allo smaltimento dei rifiuti">
        <meta name = "keywords" content = "rifiuto,ecologia,differenziata">
        <link rel = "stylesheet" type = "text/css" href = "../css/style.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/styleporta.css">
        <link rel = "icon" href="../img/tabicon.png">
        <script type = "text/javascript" src="../js/effetti.js"> </script>
        <script type="text/javascript" src="../js/orologio.js">
        </script>
</head>
<body onload="parti();">
    
    <?php
        require_once "./layout/header.php";
        require_once "./layout/navbar.php";
    ?>

    <div id="sinistra">
    
    <img id = "map" src="../img/mappaLosSantos.png" alt="Los Santos" usemap=#mapcalendariopap> 
    <map name = "mapcalendariopap">
        <area shape="poly" coords="18,140,14,174,13,189,12,203,12,222,12,238,12,255,13,291,16,307,37,311,60,309,72,309,89,309,105,306,116,306,130,306,137,302,152,297,161,284,161,269,160,238,175,230,193,227,199,216,205,208,215,205,225,203,230,192,233,184,241,169,254,160,269,159,280,159,302,158,318,158,337,161,338,145,336,128,338,115,341,106,356,103,367,99,368,86,368,76,370,48,371,27,367,19,348,10,333,10,328,17,315,21,282,22,261,24,247,24,241,24,229,38,199,42,180,43,224,46,212,44,166,44,148,44,130,44,112,45,98,46,84,46,71,46,65,46,60,57,57,64,58,75,59,85,59,96,59,109,57,127,52,133,27,134,17,152,17,158,39,136,11,271" 
        href="../php/calendarioNordOvest.php" alt="Area Nord-Ovest" onmouseover="changeColorMap('dotmapnw', 'mapnw', 'blue');" onmouseleave="changeColorMap('dotmapnw', 'mapnw', 'black');">
        <area shape="poly" coords="253,174,252,183,248,192,254,199,252,206,251,215,240,215,226,217,220,219,216,224,207,236,214,232,199,244,189,244,183,251,182,266,181,258,185,277,262,172,275,174,286,176,296,177,305,177,313,177,323,177,333,177,345,179,355,172,356,164,357,157,362,150,365,143,371,135,371,126,366,118,378,112,380,103,380,97,381,88,384,83,394,82,403,81,413,81,423,81,435,81,449,80,444,81,458,82,468,84,468,92,468,103,469,114,469,125,469,131,467,142,467,150,467,161,466,167,464,179,463,188,462,194,462,202,463,211,464,223,188,283,186,293,179,297,174,316,175,307,170,321,175,300,23,405,18,410,27,411,61,409,188,406,172,407,172,406,188,407,198,408,180,404,211,409,224,409,232,409,233,397,233,389,235,376,235,369,237,361,243,360,246,351,246,339,253,330,258,323,258,316,258,307,267,302,280,302,293,302,306,302,313,302,325,302,331,303,339,312,339,322,339,328,341,338,345,343,356,346,350,349,362,350,375,350,386,350,397,350,406,350,416,350,425,351,426,339,428,326,429,316,432,308,442,310,445,301,445,292,449,282,461,276,462,268,457,282,463,253,466,248,464,241,19,319,35,319,27,321,53,320,45,319,60,318,70,318,83,318,107,318,131,318,148,317,161,317,16,325,16,333,17,341,18,354,17,365,15,377,14,388,14,395,16,406,29,410,47,410,70,409,84,407,62,405,37,407,108,409,98,408,119,408,131,408,143,408,153,408,162,408,61,409,27,411,18,410,172,407,188,406"
        href="../php/calendarioCentraleMarittima.php" alt="Area Centrale e Marittima" onmouseover="changeColorMap('dotmapc', 'mapc', 'blue');" onmouseleave="changeColorMap('dotmapc', 'mapc', 'black');">
        <area shape="poly" coords="269,316,269,323,267,330,266,336,260,342,254,350,255,360,253,369,253,381,253,390,251,398,253,406,254,413,254,421,255,428,256,435,259,443,264,456,265,464,265,448,271,472,279,478,284,485,292,488,299,491,309,494,317,496,324,503,323,519,327,511,324,527,326,537,324,543,327,548,325,554,325,560,326,568,328,578,336,578,345,578,355,579,368,579,383,580,377,581,277,317,285,319,295,320,306,319,317,319,326,325,326,334,328,344,329,354,332,361,344,361,360,361,355,363,368,362,378,363,388,366,398,367,409,367,417,370,419,378,417,390,413,398,407,406,403,415,416,424,429,430,424,427,435,424,446,426,453,426,465,426,475,426,484,427,496,428,507,429,513,427,525,427,532,430,540,433,534,444,532,449,534,460,538,469,546,472,552,476,560,478,568,471,571,461,576,456,586,453,590,448,596,442,608,440,602,437,618,418,612,424,610,431,628,423,641,424,651,424,662,424,673,422,683,422,692,422,703,422,711,421,722,421,733,421,746,421,756,423,760,432,761,440,761,447,762,456,763,465,762,474,761,485,760,491,763,498,761,503,762,509,762,516,762,524,763,535,763,543,762,549,761,556,761,566,761,573,761,581,758,587,749,589,739,590,730,590,715,590,705,589,692,589,678,589,672,589,661,589,651,589,642,589,635,589,628,588,619,588,608,588,598,588,590,588,584,588,578,588,568,587,562,587,557,586,550,586,541,586,532,586,518,586,524,588,507,587,501,587,492,586,485,586,478,585,468,585,460,585,453,584,444,584,434,583,422,583,411,583,401,582,394,582"
        href="../php/calendarioSudEstPortuale.php" alt="Area Sud-Est e Portuale" onmouseover="changeColorMap('dotmapse', 'mapse', 'blue');" onmouseleave="changeColorMap('dotmapse', 'mapse', 'black');">
    </map>
    </div>

    <div id="didascaliapap">
        <p id="titoloelpunthome"> Calendario servizio 'Porta a Porta' </p>
        <h3> Clicca su un'area della mappa per scoprire il quartiere di appartenenza e i rispettivi giorni di raccolta </h3>
        <ul class="elencohome">
            <li id="dotmapnw"> <a id="mapnw" href= "../php/calendarioNordOvest.php"> AREA NORD-OVEST: <br> Richman, Mulholland, Rodeo, VineWood, Temple. </a> </li>
            <li id="dotmapc"> <a id="mapc" href= "../php/calendarioCentraleMarittima.php"> AREA CENTRALE E MARITTIMA: <br> Market, Mulholland Int, Downtown, Commerce, Verona Beach, Santa Maria Beach </a> </li>
            <li id="dotmapse"> <a id="mapse" href= "../php/calendarioSudEstPortuale.php"> AREA SUD-EST E PORTUALE: <br> Conference Center, Verdant Bluffs, Los Santos International, Ocean Docks </a> </li>
    </ul> 
    </div>
    <?php
			require_once "./layout/footer.php";
	?>

</body>
</html>
