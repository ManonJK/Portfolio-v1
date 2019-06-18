<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav/nav.css">
    <title>Accueil</title>
</head>
<body>

<header>
    <?php
    include ('nav/nav.php');
    ?>
</header>

<main>

    <div id="fond"></div>

    <div id="gauche">
        <div id="contenu">
            <h1>Bienvenue sur mon <span><strong>site CV</strong></span></h1>
            <div>
                <p>Je suis Manon JULIEN KUENTZ, étudiante en première année d'<strong>informatique</strong> à YNOV <strong>Aix en Provence</strong>.
                    Spécialisée dans le <strong>développement Web</strong>, vous trouverez mon <strong>Portfolio</strong> ainsi que toutes les informations me concernant. </p>
            </div>

            <div>
                <button class="button01" type="button" onclick="window.location.href='#'" target="_blank">A propos</button>
                <button class="button01" type="button" onclick="window.location.href='portfolio.php'" target="_blank">Portfolio</button>
            </div>
        </div>
    </div>

</main>

</body>
</html>