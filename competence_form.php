<?php
    //formulaire de gestion des compétences
    //on va afficher toutes les compétences disponibles dans une liste (comme les utilisateurs)

    require_once('db.php');
    $rqt = "SELECT * FROM competence";
    $stmt = $pdo->prepare($rqt);
    $stmt->execute();
?>

<form action="index.php" method="POST" name="form_competences">
    <select name="compet">
        <?php
            while($c = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $c['id_competence'] . "'>" . $c['libelle'] . "</option>";
            }
        ?>
    </select>
    <input type="number" name="niveau" required value="0" />
    <input type="submit" name="submit" value="ajouter" />
    <input type="submit" name="submit" value="modifier" />
    <input type="submit" name="submit" value="supprimer" />
</form>
