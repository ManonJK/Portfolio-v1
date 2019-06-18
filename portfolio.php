<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav/nav.css">
    <title>Portfolio</title>
</head>
<body>

<header>
    <?php
    include ('nav/nav.php');
    ?>
</header>

<main>
    <div id="fond"></div>

    <div id="gaucheport">
        <h1 id="h1port"><strong>Portfolio</strong></h1>
    </div>

    <div id="droiteport">

        <div class="contenu">
            <div class="montexte" id="justifie">
                <h2>Mini projet de jeux Python</h2>
                <p>Lors de ma première année en informatique, j'ai eu l'occasion de découvrir le langage Python dans
                    le développement de jeux de Casio en Tkinter. En groupe de 3, nous avons su nous organiser et travailler
                    de façon parallèle afin d'être efficaces.</p>
            </div>
            <img src="images/image.jpg" alt="Image du mini projet python tkinter">
        </div>

        <div class="contenu">
            <img src="images/image.jpg" alt="Image de mon projet jeu web">
            <div class="montexte">
                <h2>Projet de Jeu Web</h2>
                <p>Durant ma dernière année de lycée, j'ai eu l'occasion de découvrir le langage HTML, CSS et JavaScript
                dans le développement d'un jeu web pour enfants, en tant que chef de projet.</p>
            </div>
        </div>

        <div id="colonne">
            <div class="contenu">
                <button class="button01" type="button" onclick="window.location.href='#'" target="_blank">Expériences</button>
                <button class="button01" type="button" onclick="window.location.href='#'" target="_blank">Projets</button>
            </div>
        </div>


    </div>
</main>

</body>
</html>