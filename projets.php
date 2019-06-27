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
$rqtP = "SELECT * FROM projets";

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

<?php
include ('footer.php');
?>

</body>
</html>