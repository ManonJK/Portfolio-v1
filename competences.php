<?php
//sous-fichier qui permet d'afficher les compétences de chacun
/*
    if(!isset($_SESSION['user_name'])) {
        exit();
    }
*/
require_once('db.php');/*
    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];*/
$rqtC1 = "SELECT * FROM competences WHERE id_catcomp = 1";
$rqtC2 = "SELECT * FROM competences WHERE id_catcomp = 2";
$rqtC3 = "SELECT * FROM competences WHERE id_catcomp = 3";

try {
    $stmt1 = $pdo->prepare($rqtC1);
    $stmt1->execute();
    $stmt2 = $pdo->prepare($rqtC2);
    $stmt2->execute();
    $stmt3 = $pdo->prepare($rqtC3);
    $stmt3->execute();
} catch(Exception $e) {
    $e->getMessage();
}
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
    <?php
    include ('nav.php');
    ?>
</header>


<main class="maincolonne">

    <div class="fond"></div>
    <h1>Découvrez mes <span><strong>compétences</strong></span></h1>

    <div class="categoriecomp">
        <h2>Développement Web</h2>
        <div class="mescompenligne">
            <?php
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
            <?php
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
            <?php
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

<?php
include ('footer.php');
?>

</body>
</html>