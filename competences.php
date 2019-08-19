<?php
session_start(); #On start la session
require_once('db.php'); #On connecte à la base

#Chaque requête permet l'affichage de toutes les compétences de chasue catégorie
$rqtC1 = "SELECT * FROM competences WHERE id_catcomp = 1"; #Compétences web
$rqtC2 = "SELECT * FROM competences WHERE id_catcomp = 2"; #Compétences logiciel
$rqtC3 = "SELECT * FROM competences WHERE id_catcomp = 3"; #Compétences infra

$stmt1 = $pdo->prepare($rqtC1);
$stmt1->execute();
$stmt2 = $pdo->prepare($rqtC2);
$stmt2->execute();
$stmt3 = $pdo->prepare($rqtC3);
$stmt3->execute();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Retrouvez toutes mes compétences ainsi que mes certifications"/>
    <meta name="keywords" content="Compétences, Développement, Web, HTML, CSS, JS, Python, PHP, CCNA1, Langage C"/>
    <link rel="stylesheet" href="style.css">
    <title>Manon JULIEN KUENTZ - Compétences</title>
</head>
<body>


<header>
    <?php #On inclut la navbar
    include ('nav.php');
    ?>
</header>


<main class="maincolonne">

    <div class="fond"></div> <!--On met le fond de l'écran pour qu'il s'affiche parfaitement et qu'on puisse gérer sa transparence sans agir sur le reste-->
    <h1>Découvrez mes <span><strong>compétences</strong></span></h1>

    <div class="categoriecomp">
        <h2>Développement Web</h2>
        <div class="mescompenligne">
            <?php #On affiche les compétences de la première requête
            while($c = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='mycompetences'>";
                echo "<h3>" . $c['libelle'] . "</h3>";
                echo "<img src='" . $c['logo'] . "' alt='" . $c['alt'] . "' />";
                echo "</div>";
            }
            ?>
        </div>
    </div>


    <div class="categoriecomp">
        <h2>Développement Logiciel</h2>
        <div class="mescompenligne">
            <?php #On affiche les compétences de la seconde requête
            while($c = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='mycompetences'>";
                echo "<h3>" . $c['libelle'] . "</h3>";
                echo "<img src='" . $c['logo'] . "' alt='" . $c['alt'] . "' />";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <div class="categoriecomp">
        <h2>Infrastructure et réseaux</h2>
        <div class="mescompenligne">
            <?php #On affiche les compétences de la troisième requête
            while($c = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='mycompetences'>";
                echo "<h3>" . $c['libelle'] . "</h3>";
                echo "<img src='" . $c['logo'] . "' alt='" . $c['alt'] . "' />";
                echo "</div>";
            }
            ?>
        </div>
    </div>


</main>

<?php #On met le footer
include ('footer.php');
?>

</body>
</html>