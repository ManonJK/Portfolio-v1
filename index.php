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

    <div class="fond"></div>

    <div id="gauche">
        <div id="contenu">
            <h1>Bienvenue sur mon <span><strong>site CV</strong></span></h1>
            <div>
                <p>Je suis Manon JULIEN KUENTZ, étudiante en première année d'<strong>informatique</strong> à YNOV <strong>Aix en Provence</strong>.
                    Spécialisée dans le <strong>développement Web</strong>, vous trouverez mon <strong>Portfolio</strong> ainsi que toutes les informations me concernant. </p>
            </div>

            <div>
                <button class="button01" type="button" onclick="window.location.href='propos.php'" target="_blank">A propos</button>
                <button class="button01" type="button" onclick="window.location.href='portfolio.php'" target="_blank">Portfolio</button>
            </div>
        </div>
    </div>

</main>

</body>
</html>