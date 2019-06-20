<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Retrouvez l'ensemble de mes projets : site cv, plante connectée, projet infrastructure réseau, etc"/>
    <meta name="keywords" content="Site CV, Plante connectée, Infrastructure, réseau,  Informatique, VMWare, arduino, HTML5, CSS3, Javascript, PHP, langage C"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Manon JULIEN KUENTZ - Projets</title>
</head>
<body>

<header>
    <?php
    include ('nav.php');
    ?>
</header>

<main>

    <div class="fond"></div>

    <h1>Découvrez mes <span>projets</span></h1>

    <div class="card-deck">

        <div class="card">
            <img src="images/projet_web.png" class="card-img-top" alt="Logo du projet Site CV">
            <div class="card-body">
                <h2>Site CV</h2>
                <p class="card-text">
                    Ce projet est exactement ce que vous avez sous les yeux : mon <strong>site CV</strong>. Pour réaliser ce projet,
                    j'ai utilisé mes compétences en référencement, ergonomie, <strong>HTML5, CSS3, Javascript, et PHP</strong>.
                </p>
            </div>
        </div>

        <div class="card">
            <img src="images/plante_co.png" class="card-img-top" alt="Logo du projet Plante Connectée">
            <div class="card-body">
                <h2>Plante connectée</h2>
                <p class="card-text">
                    Durant ce projet, nous avons été en équipe de 2 personnes afin de rendre automatique l'entretien d'une plante.
                    Ce projet s'est fait avec une carte <strong>arduino</strong> qui, reliée à différents capteurs, relève les données de la plante
                    et contrôle les appareils connectés permettant l'entretien de cette dernière. Le <strong>langage C</strong> a donc été utilisé
                    afin de mettre en place ce projet.
                </p>
            </div>
        </div>

        <div class="card">
            <img src="images/infra.png" class="card-img-top" alt="Logo du projet Infrastucture">
            <div class="card-body">
                <h2>Infrastructure réseau</h2>
                <p class="card-text">Durant ce projet, nous avons été placés en équipe de 2 personnes
                    afin de simuler un <strong>réseau</strong> d'entreprise. Nous avons réalisé cela sous <strong>VMWare</strong>.</p>
            </div>
        </div>

    </div>

</main>

</body>
</html>