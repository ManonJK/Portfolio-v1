<?php
session_start(); #On start la session
require_once('db.php'); #On connecte à la base

#Requête qui permet de récupérer tous les projets
$rqtP = "SELECT * FROM projets";
$stmt = $pdo->prepare($rqtP);
$stmt->execute();
?>

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
    <?php #On inclut la navbar
    include ('nav.php');
    ?>
</header>

<main>

    <div class="fond"></div> <!--On met le fond de l'écran pour qu'il s'affiche parfaitement et qu'on puisse gérer sa transparence sans agir sur le reste-->

    <h1>Découvrez mes <span>projets</span></h1>

    <!--On affiche tous nos projets (résultats de la requête) dans des cards-->
    <div class="card-deck">


        <?php
            while($c = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='card'>";
                echo "<img src='" . $c['image'] . "' alt='" . $c['alt'] . "' />";
                echo "<div class='card-body'>";
                echo "<h2>" . $c['titre'] . "</h2>";
                echo "<p class='card-text'>" . $c['contenu'] . "</p>";
                echo "</div>";
                echo "</div>";
            }
        ?>


    </div>

</main>

<?php #On inclut le footer
include ('footer.php');
?>

</body>
</html>