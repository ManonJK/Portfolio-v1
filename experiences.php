<?php
//sous-fichier qui permet d'afficher les compétences de chacun
/*
    if(!isset($_SESSION['user_name'])) {
        exit();
    }
*/
header( 'content-type: text/html; charset=utf-8' );
require_once('db.php');
/*
    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];*/
$rqtP = "SELECT * FROM experiences_pro";

try {
    $stmt = $pdo->prepare($rqtP);
    $stmt->execute();
} catch(Exception $e) {
    $e->getMessage();
}
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
    <?php
    include ('nav.php');
    ?>
</header>

<main>

    <div class="fond"></div>

    <div>
        <h1>Découvrez mes expériences</h1>
    </div>

    <div class="bg taille50">

        <?php
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

<?php
include ('footer.php');
?>

</body>
</html>