<?php
session_start(); #On start la session
require_once('db.php');#On lie avec la bdd

#Requête qui nous permet de récupérer toutes nos expériences professionnelles
$rqtP = "SELECT * FROM experiences_pro";
$stmt = $pdo->prepare($rqtP);
$stmt->execute();

/*On fait une requête qui affiche tout les modaux */
$rqtM = "SELECT * FROM modaux";

$stmtM = $pdo->prepare($rqtM);
$stmtM->execute();

?>


<!DOCTYPE html>
<html lang="fr" class="height">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Retrouvez chacune de mes expériences professionnelles"/>
    <meta name="keywords" content="Stages, Startup, Workshop, équipe, compétition, Equipe aléatoire, problématiques d'entreprises"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Manon JULIEN KUENTZ - Expériences</title>
</head>
<body class="height">

<header>
    <?php #On inclut la navbar
    include ('nav.php');
    ?>
</header>

<main>

    <div class="fond"></div> <!--On met le fond de l'écran pour qu'il s'affiche parfaitement et qu'on puisse gérer sa transparence sans agir sur le reste-->

    <div>
        <h1>Découvrez mes <span>expériences</span></h1>
    </div>

    <!--On affiche tous nos projets (résultats de la requête) dans des cards-->
    <div class="div_modal">
        <div class="mescompenligne">
            <!-- On affiche l'image du projet -->
            <?php
            while($c = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='img_modal'>";
                echo "<img src='" . $c['logo'] . "' alt='" . $c['alt'] . "' data-toggle='modal' data-target='" . $c['data_target'] . "'/>";
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

</main>

<?php #On inclut le footer
include ('footer.php');
?>

</body>
</html>