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
    <link rel="stylesheet" href="admin.css">
    <script src="script.js"></script>
</head>
<body class="height">
<header>
<?php include("nav.php"); ?>
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
                echo "id ou mdp incorrect";
                session_destroy();
            }
            /*}
            else
            {
                session_destroy();
            }*/
            break;

        case 'supprimer' : //on supprime la compétence d'un utilisateur
            $id_user = $_SESSION['user_id'];
            $id_Cpt = $_POST['compet'];
            try {
                $rqtSupp = "DELETE FROM competence_utilisateur WHERE id_competence = :idc AND id_utilisateur = :idu ";
                $stmtSupp = $pdo->prepare($rqtSupp);
                $stmtSupp->execute(['idc' => $id_Cpt, 'idu' => $id_user]);
            } catch(Exception $e){
                $e->getMessage();
            }
            break;

        case 'ajouter' : //Ici on execute le même code que si on fait 'modifier'
        case 'modifier' :
            // INSERT INTO ... ON DUPLICATE KEY UPDATE
            $id_user = $_SESSION['user_id'];
            $id_Cpt = $_POST['compet'];
            $id_niv = $_POST['niveau'];
            try{
                $rqtModif ="INSERT INTO competence_utilisateur VALUES (:idu, :idc,:idn) WHERE id_competence = :idc AND id_utilisateur = :idu AND id_niveau = :idn ON DUPLICATE KEY UPDATE niveau=:idn";
                $stmtModif = $pdo->prepare($rqtModif);
                $stmtModif->execute(['idc' => $id_Cpt, 'idu' => $id_user, 'idn' => $id_niv]);
            } catch (Exception $e){
                $e->getMessage();
            }
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
        echo "<p>Hello " . $_SESSION['psd'] . "</p>";
        ?>

        <div>
            <h2>Gérer les compétences</h2>

            <form method="POST" name="form_competences" class="row">
                <select name="compet">
                    <?php
                    while($c = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $c['id_comp'] . "'>" . $c['libelle'] . "</option>";
                    }
                    ?>
                </select>
                <input type="submit" name="submit" value="Supprimer" />
            </form>

            <form action="upload.php" method="post" enctype="multipart/form-data">
                Sélectionner une image à charger :
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>

        </div>

        <form method='POST' id="deconnect">
            <input type="submit" value="Se déconnecter" name='disconnect'/>
            <?php
            if(isset($_POST['disconnect']))
            {
                session_start();
                session_unset();
                session_destroy();
                echo '<meta http-equiv="refresh" content="1; url=admin.php" />';
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
    </div>
<?php } ?>

</main>
</body>
</html>