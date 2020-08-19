<?php
session_start(); #On start la session
require_once('db.php'); #On connecte à la base
?>

<!DOCTYPE html>
<html lang="fr" class="height">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Bienvenue sur mon site CV. Retrouvez toutes les informations me concernant, Manon JULIEN KUENTZ"/>
    <meta name="keywords" content="Accueil, Développement, Etudiante, Portfolio, Web, Informatique, Présentation"/>
    <link rel="stylesheet" href="style.css">
    <title>Manon JULIEN KUENTZ - Accueil</title>
</head>
<body class="height">

<header>
    <?php
    include ('nav.php');
    ?>
</header>

<main>

    <div class="fond"></div> <!--On met le fond de l'écran pour qu'il s'affiche parfaitement et qu'on puisse gérer sa transparence sans agir sur le reste-->

    <div id="gauche">
        <div id="contenu">
            <h1>Bienvenue sur mon <span><strong>site CV</strong></span></h1> <!--Titre principal de la page-->
            <div> <!--Texte de la page-->
                <p>Je suis Manon JULIEN KUENTZ, étudiante en première année d'<strong>informatique</strong> à YNOV <strong>Aix en Provence</strong>.
                    Spécialisée dans le <strong>développement Web</strong>, vous trouverez mon <strong>Portfolio</strong> ainsi que toutes les informations me concernant. </p>
            </div>

            <!--On fait les liens de nos boutons vers les pages à rpopos et portfolio-->
            <div>
                <button class="button01" type="button" onclick="window.location.href='propos.php'">A propos</button>
                <button class="button01" type="button" onclick="window.location.href='experiences.php'">Expériences</button>
            </div>
        </div>
    </div>

</main>

<?php #On inclut le footer
include ('footer.php');
?>

</body>
</html>