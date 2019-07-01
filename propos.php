<?php
session_start(); #On start la session
require_once('db.php'); #On connecte à la base
?>

<!DOCTYPE html>
<html lang="fr" class="height">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Découvrez qui je suis et suivez-moi sur mes réseaux sociaux"/>
    <meta name="keywords" content="Compétences, Contact, CV, Portfolio, Chef de projet, Scientifique, Informatique, Passions, curieuse, intéressée, motivée, patiente, travailler en équipe"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Manon JULIEN KUENTZ - A propos</title>

</head>
<body class="height">

<header>
    <?php #On inclut la navbar
    include ('nav.php');
    ?>
</header>

<main class="row1" id="width100">

    <div class="fond"></div><!--On met le fond de l'écran pour qu'il s'affiche parfaitement et qu'on puisse gérer sa transparence sans agir sur le reste-->

    <div class="height60 row bgwhite">

        <!--Div qui sert à l'affichage de la photo et du bouton vers les compétences-->
        <div class="colonne">
            <div class="margin20">
                <img src="images/photo.jpg" alt="Photo de moi"/>
            </div>
            <div class="mes_boutons">
                <button class="button01" type="button" onclick="window.location.href='competences.php'" target="_blank">Compétences</button>
            </div>
        </div>

        <!--Cette f=div affiche tout le reste de la page-->
        <div class="colonne">
            <!--Affichage de la présentation-->
            <div id="textepropos" class="margin20">
                <h1>Découvrez qui je suis</h1>
                <p>Etudiante en première année d'informatique à Ynov Aix-en-Provence, je suis
                    spécialisée dans le développement Web.
                    Mes passions en terme de fiction, de pâtisserie, et d'exploration sous-marine
                    font de moi une personne <strong>curieuse, intéressée, motivée</strong>,
                    et <strong>patiente</strong>. J'aime <strong>travailler
                    en équipe</strong> et en apprendre toujours plus dans ma vie professionnelle comme personnelle.</p>
            </div>

            <!--Affichage des boutons Portfolio et CV-->
            <div class="mes_boutons">
                <button class="button01" type="button" onclick="window.location.href='portfolio.php'" target="_blank">Portfolio</button>
                <button class="button01" type="button" onclick="window.location.href='CV_FR.pdf'" target="_blank">CV</button>
            </div>
        </div>

    </div>

    <!--Affichage des réseaux sociaux-->
    <div class="colonne bgwhite">

        <div class="colonne margin20">
            <h2>Réseaux sociaux</h2>

            <div id="mes_reseaux">
                <a href="https://twitter.com/manon_julienk?lang=fr" target="_blank"><i class="fab fa-twitter fa-3x"></i></a>
                <a href="https://www.linkedin.com/in/manon-julien-kuentz-213212171/" target="_blank"><i class="fab fa-linkedin-in fa-3x"></i></a>
                <a href="" target="_blank"><i class="fab fa-instagram fa-3x"></i></a>
            </div>
        </div>
        <div class="mes_boutons">
            <button class="button01" type="button" onclick="window.location.href='contact.php'" target="_blank">Contact</button>
        </div>
    </div>

</main>

<?php #On inclut le footer
include ('footer.php');
?>

</body>
</html>