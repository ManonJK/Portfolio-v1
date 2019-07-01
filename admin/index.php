<?php
session_start();
include_once('db.php');

$rqt = "SELECT * FROM competences";

try {
    $stmt = $pdo->prepare($rqt);
    $stmt->execute();
} catch(Exception $e) {
    $e->getMessage();
}


?>


<html lang="fr" class="height">
<head>
    <meta charset="UTF-8">

    <meta name="keywords" content="Connexion, Administration" />
    <meta name="description" content="Gérer le site de Manon JK" />
    <?php if(isset($_SESSION['mdp'])){?>
        <title>Manon JK - Administration</title>
    <?php } else{ ?>
        <title>Manon JK - Connexion</title>
    <?php } ?>
    <!--<link rel="icon" href=Icone.png>-->
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body class="height">
<header>
    <?php include("navAdmin.php"); ?>
</header>

<main>

    <?php

    //Ici on va gérer les différents formulaires
    if(isset($_POST['submit'])){
        switch($_POST['submit']) {
            case 'Connexion' :
                /*if(isset($_POST['psd'])&&isset($_POST['mdp']))
                {*/
                $reponse = $pdo->prepare("SELECT * FROM utilisateur WHERE user_name = ?");
                $reponse->execute(array($_POST['psd']));
                $utilisateur=$reponse->fetch();
                $_SESSION['psd']=$utilisateur['user_name'];
                if($_POST['mdp']==$utilisateur['user_passwd'])
                {
                    $_SESSION['mdp']= $_POST['mdp'];
                }
                else
                {
                    $idormdp = "id ou mdp incorrect";
                    session_destroy();
                }
                /*}
                else
                {
                    session_destroy();
                }*/
                break;



        }

    }
    ?>




    <?php
    if(isset($_SESSION['mdp']))
    { ?>
        <div>
            <h1>Administration site CV</h1>
            <?php
            echo "<p>Hello " . $_SESSION['psd'] . ", vous possédez les pleins pouvoirs</p>";
            ?>

            <form method='POST' id="deconnect">
                <input type="submit" value="Se déconnecter" name='disconnect'/>
                <?php
                if(isset($_POST['disconnect']))
                {
                    session_start();
                    session_unset();
                    session_destroy();
                    echo '<meta http-equiv="refresh" content="1; url=index.php" />';
                }
                ?>
            </form>

        </div>
        <?php
    }

    else{
        ?>
        <div>
            <h1>Connexion</h1>
            <h2>Se connecter pour accéder à la page d'administration</h2>
            <form method='POST' class="colonne" id="aligncenter">
                <div class="check">
                    <input type='text' name="psd" placeholder='Identifiant' required/>
                    <input type='password' name='mdp' id="passwd" placeholder=' Mot de passe' required/>
                </div>
                <div class="row check">
                    <input type="checkbox" onclick="showPass()">
                    Show Password
                </div>
                <input type="submit" name="submit" value="Connexion"/>
            </form>
            <?php
            if (isset($idormdp)){
                echo '<div>' . $idormdp . '</div>';
            }
            ?>
        </div>
    <?php } ?>

</main>
</body>
</html>

