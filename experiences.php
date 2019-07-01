<?php
session_start(); #On start la session
require_once('db.php');#On lie avec la bdd

#Requête qui nous permet de récupérer toutes nos expériences professionnelles
$rqtP = "SELECT * FROM experiences_pro";
$stmt = $pdo->prepare($rqtP);
$stmt->execute();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Retrouvez chacune de mes expériences professionnelles"/>
    <meta name="keywords" content="Stages, Startup, Workshop, équipe, compétition, Equipe aléatoire, problématiques d'entreprises"/>
    <link rel="stylesheet" href="style.css">
    <title>Manon JULIEN KUENTZ - Expériences</title>
</head>
<body>

<header>
    <?php #On inclut la navbar
    include ('nav.php');
    ?>
</header>

<main>

    <div class="fond"></div> <!--On met le fond de l'écran pour qu'il s'affiche parfaitement et qu'on puisse gérer sa transparence sans agir sur le reste-->

    <div>
        <h1>Découvrez mes expériences</h1>
    </div>

    <div class="bg taille50">

        <?php #On affiche toutes nos expériences dans des cards
            while($c = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='contenu'>";
                echo "<div class='taille50'>";
                echo "<img src='" . $c['image'] . "' alt='" . $c['alt'] . "' />";
                echo "</div>";
                echo "<div class='montexte taille50'>";
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