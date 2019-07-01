<?php
# On vérifie que l'utilisateur est connecté ou non. Si non, il est redirigé vers la page de connexion
if(!isset($_SESSION['mdp'])) {session_start();}
if(!isset($_SESSION['mdp'])){?>
    <meta http-equiv="refresh" content="0;URL=index.php">
    <?php
}
else{

    require_once('db.php');
    ?>
    <html lang="fr">

    <head>
        <?php
        include("AdminHead.php");
        ?>
    </head>

    <body class="height">
    <?php
    require_once("modExp.php");
    ?>
    <header>
        <?php include("navAdmin.php"); ?>
    </header>

    <main>

        <h1>Messages reçus</h1>

        <?php
        $rqt = $pdo->prepare('SELECT * FROM messages');
        $rqt->execute();
        while($c = $rqt->fetch()){
            echo "<h2>Message de " .$c['prenom'] ." " .$c['nom'] . "</h2>";
            echo "<div>Mail : " . $c['mail'] ."</div>";
            echo "<div>Téléphone : " . $c['phone'] ."</div>";
            echo "<div>Contenu du message : " . $c['message'] ."</div>";
        }
        ?>

    </main>
    </body>
    </html>

<?php  }
?>
