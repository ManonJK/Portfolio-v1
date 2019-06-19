<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <title>A propos</title>
</head>
<body>

<header>
    <?php
    include ('nav/nav.php');
    ?>
</header>

<main>

    <div class="fond"></div>

    <div id="gauche">
        <img src="images/photo.jpg" alt="Photo de moi"/>
        <button class="button01" type="button" onclick="window.location.href='#'" target="_blank">Compétences</button>
    </div>

    <div id="middle">
        <h1>Découvez qui je suis</h1>
        <p>Etudiante en première année d'informatique à Ynov Aix-en-Provence, je suis
        spécialisée dans le développement Web.
        Mes passions en terme de fiction, de pâtisserie, et d'exploration sous-marine
        font de moi une personne <strong>curieuse, intéressée, motivée</strong>,
        et <strong>patiente</strong>. J'aime <strong>travailler
        en équipe</strong> et en apprendre toujours plus dans ma vie professionnelle comme personnelle.</p>

        <div id="mes_boutons">
            <button class="button01" type="button" onclick="window.location.href='#'" target="_blank">Portfolio</button>
            <button class="button01" type="button" onclick="window.location.href='Portfolio.html'" target="_blank">CV</button>
        </div>
    </div>

    <div id="droite">
        <h2>Réseaux sociaux</h2>

        <div id="mes_reseaux">
            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" title="Mon Pseudo discord"><i class="fab fa-discord"></i></a>
        </div>
        <button class="button01" type="button" onclick="window.location.href='#'" target="_blank">Contact</button>

</main>

</body>
</html>