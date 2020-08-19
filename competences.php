<?php
session_start(); #On start la session
require_once('db.php'); #On connecte à la base

#Chaque requête permet l'affichage de toutes les compétences de chaque catégorie
$rqtC1 = "SELECT * FROM competences WHERE id_catcomp = 1"; #Compétences web
$rqtC2 = "SELECT * FROM competences WHERE id_catcomp = 2"; #Compétences logiciel
$rqtC3 = "SELECT * FROM competences WHERE id_catcomp = 3"; #Compétences infra

$stmt1 = $pdo->prepare($rqtC1);
$stmt1->execute();
$stmt2 = $pdo->prepare($rqtC2);
$stmt2->execute();
$stmt3 = $pdo->prepare($rqtC3);
$stmt3->execute();

/*On fait une requête qui affiche tout les modaux */
$rqtM = "SELECT * FROM modaux";

$stmtM = $pdo->prepare($rqtM);
$stmtM->execute();


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

    <div class="categoriecomp bgwhite div_modal">
        <h2>Développement Web</h2>
        <div class="mescompenligne">
            <?php #On affiche les compétences de la première requête
            while($c = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='mycompetences'>";
                echo "<div data-toggle='modal' data-target='" . $c['data_target'] . "'>";
                echo "<h3>" . $c['libelle'] . "</h3>";
                echo "<img src='" . $c['logo'] . "' alt='" . $c['alt'] . "' />";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>

        <!-- On affiche le modal de la compétence-->
        <?php
        while($c = $stmtM->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='modal fade' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true' id='" .  $c['id_mod'] ."'>";
            echo "<div  class='modal-dialog modal-dialog-centered' role='document'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title'>" . $c['titre'] . "</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>x</span>";
            echo "</button>";
            echo "</div>";
            echo "<div class='modal-body'>" . $c['contenu'] . "</div>";
            echo "<div class='modal-footer'>";
            if($c['fichier']=='') {
                echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
            } else {
                echo "<button type='button' class='btn btn-secondary'><a style='color: #fff;' href='" . $c['fichier'] . "' target='_blank'>" . $c['titre_fichier'] . "</a></button>";
            }
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>


    <div class="categoriecomp bgwhite">
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

    <div class="categoriecomp bgwhite">
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