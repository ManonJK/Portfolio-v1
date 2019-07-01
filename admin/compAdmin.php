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

    <body>
    <?php
        require_once("modComp.php");
    ?>
    <header>
        <?php include("navAdmin.php"); ?>
    </header>

    <main>
    <h1>Gérer les compétences</h1>

    <div class="suppcomp">
        <h2>Supprimer une compétence</h2>
        <form method="post" class="row" action="compAdmin.php">
            <select name="SuppComp">
                <option>
                <?php
                $rqt = $pdo->prepare('SELECT * FROM competences');
                $rqt->execute();
                while($c = $rqt->fetch()){
                    $valueComp = $c['id_comp'];
                    $nomComp = $c['libelle'];
                    echo "<option value='$valueComp'>$nomComp";
                }
                ?>
            </select>
            <input type="submit" name="submitSuppComp" value="Supprimer" />
        </form>
        <?php
            if(isset($messageDel)){
                echo '<div>' . $messageDel . '</div>';
            }
        ?>
    </div>

    <div class="modifcomp">
        <h2>Modifier une compétence</h2>
        <form action="compAdmin.php" method="post" enctype="multipart/form-data">
            <div>
                <p>Sélectionner la compétence à modifier :</p>
                <select name="modifCompName">
                    <option>
                    <?php
                    $rqt = $pdo->prepare('SELECT * FROM competences');
                    $rqt->execute();
                    while($c = $rqt->fetch()){
                        $valueComp = $c['id_comp'];
                        $nomComp = $c['libelle'];
                        echo "<option value='$valueComp'>$nomComp";
                    }
                    ?>
                </select>
            </div>

            <div>
                <p>Sélectionner une image à charger :</p>
                <input type="file" name="modifCompImg" accept="image/png">
            </div>

            <div>
                <p>Nouveau titre :</p>
                <textarea maxlength="50" name="modifCompTitre"></textarea>
            </div>

            <div>
                <p>Nouveau Alt :</p>
                <textarea maxlength="50" name="modifCompAlt"></textarea>
            </div>

            <div>
                <p>Type de compétence :</p>
                <select name="modifCompType">
                    <option>
                    <?php
                    $rqt = $pdo->prepare('SELECT * FROM categorie_comp');
                    $rqt->execute();
                    while($c = $rqt->fetch()){
                        $valueComp = $c['id_catcomp'];
                        $nomComp = $c['libelle'];
                        echo "<option value='$valueComp'>$nomComp";
                    }
                    ?>
                </select>
            </div>

            <div><input type="submit" value="Valider les changements" name="submitModComp"></div>
        </form>
        <?php
        if(isset($messageMod)){
            echo '<div>' . $messageMod . '</div>';
        }
        ?>
    </div>

    <div class="ajoutcomp">
        <h2>Ajouter une compétence</h2>
        <form method="post" action="compAdmin.php" enctype="multipart/form-data">

            <div>
                <p>Type de compétence :</p>
                <select name="AddCompType">
                    <option>
                    <?php
                    $rqt = $pdo->prepare('SELECT * FROM categorie_comp');
                    $rqt->execute();
                    while($c = $rqt->fetch()){
                        $valueComp = $c['id_catcomp'];
                        $nomComp = $c['libelle'];
                        echo "<option value='$valueComp'>$nomComp";
                    }
                    ?>
                </select>
            </div>

            <div>
                <p>Sélectionner une image à charger :</p>
                <input type="hidden" name="MAX_FILE_SIZE" value="120000" />
                <input type="file" name="AddCompImg" accept="image/png">
            </div>
            <div>
                <p>Titre :</p>
                <textarea maxlength="50" name="AddCompTitre"></textarea>
            </div>

            <div>
                <p>Alt :</p>
                <textarea maxlength="50" name="AddCompAlt"></textarea>
            </div>

            <input type="submit" value="Ajouter la compétence" name="submitAddComp">
        </form>
    </div>

    </main>
    </body>
    </html>

<?php  }
?>
