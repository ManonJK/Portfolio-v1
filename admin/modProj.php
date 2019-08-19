<?php
if(isset($_SESSION['mdp'])) {
    if (isset($_POST['submitSuppComp'])) {
        if ($_POST['SuppComp'] == "") {
            $_POST['SuppComp'] = NULL;
        }
        /* on supprime un projet */
        if (isset($_POST['SuppComp'])) {
            $idComp = $_POST['SuppComp'];
            $rqt = $pdo->prepare('SELECT libelle FROM projets WHERE id_projet = ?');
            $rqt->execute(array($idComp));
            $c = $rqt->fetch();
            $dir = '../images/';
            $filename = mb_strtolower($c['libelle']) . ".png";
            $filename = str_replace(" ", "_", $filename);
            $dirfile = $dir . $filename;
            unlink($dirfile);
            $rqt = $pdo->prepare('DELETE FROM projets WHERE id_projet = ?');
            $rqt->execute(array($idComp));
            $rqt2 = $pdo->prepare('DELETE FROM modaux WHERE titre = ?');
            $rqt2->execute(array($c['libelle']));
            $SuppMsg = 'Ok. Projet ' . $c['libelle'] . ' supprimé';
        } else {
            $SuppMsg = '<script>alert("Aucun projet à supprimer n\'a été sélectionné")</script>';
        }
    }
    /* On modifie un projet */
    if (isset($_POST['submitModComp'])) {
        if ($_POST['modifCompName'] == "") {
            $_POST['modifCompName'] = NULL;
        }
        if ($_FILES['modifCompImg']['name'] == "") {
            $_FILES['modifCompImg']['name'] = NULL;
        }
        if ($_POST['modifCompTitre'] == "") {
            $_POST['modifCompTitre'] = NULL;
        }
        if ($_POST['modifCompType'] == "") {
            $_POST['modifCompType'] = NULL;
        }
        if ($_POST['modifCompModal'] == "") {
            $_POST['modifCompModal'] = NULL;
        }
        if ($_POST['modifCompAlt'] == "") {
            $_POST['modifCompAlt'] = NULL;
        }

        if (isset($_POST['modifCompName'])) {
            $idComp = htmlspecialchars($_POST['modifCompName']);
            if (isset($_POST['modifCompTitre'])) {
                $q = $pdo->prepare('SELECT libelle FROM projets WHERE id_projet = ?');
                $q->execute(array($idComp));
                $c = $q->fetch();
                $oldName = htmlspecialchars($c['libelle']);
                $oldName = str_replace(" ", "_", $oldName);
                $oldNameImage = mb_strtolower('../images/' . $oldName . '.png');
                $newName = htmlspecialchars($_POST['modifCompTitre']);
                $newNameImage = str_replace(" ", "_", $newName);
                $newDBNameImage = mb_strtolower('images/' . $newNameImage . '.png');
                $newNameImage = mb_strtolower('../images/' . $newNameImage . '.png');
                rename($oldNameImage, $newNameImage);
                $rqt = $pdo->prepare('UPDATE projets SET libelle = ?, logo = ? WHERE id_projet = ?');
                $rqt->execute(array($newName, $newDBNameImage, $idComp));
                $rqt2 = $pdo->prepare('UPDATE modaux SET titre = ? WHERE titre = ?');
                $rqt2->execute(array($newName, $oldName));
                $messageModName = 'Ok, nom du projet défini sur ' . $newName . '<br>';
            }
            if (isset($_POST['modifCompAlt'])) {
                $alt = htmlspecialchars($_POST['modifCompAlt']);
                $rqt = $pdo->prepare('UPDATE projets SET alt = ? WHERE id_projet = ?');
                $rqt->execute(array($alt, $idComp));
                $messageModAlt = 'Ok, alt de l\'image défini sur ' . $alt . '<br>';
            }
            if (isset($_POST['modifCompType'])) {
                $q = $pdo->prepare('SELECT m.contenu, m.titre FROM modaux m JOIN projets p ON m.titre=p.libelle WHERE p.id_projet = ?');
                $q->execute(array($idComp));
                $c = $q->fetch();
                $oldName = $c['titre'];
                $oldCont = htmlspecialchars($c['contenu']);
                $newCont = htmlspecialchars($_POST['modifCompType']);
                $rqt = $pdo->prepare('UPDATE modaux SET contenu = ? WHERE titre = ?');
                $rqt->execute(array($newCont, $oldName));
                $messageModCat = 'Ok, contenu de ' . $c['titre'] . ' mis à jour<br>';
            }
            if (isset($_POST['modifCompModal'])) {
                $q = $pdo->prepare('SELECT m.titre FROM modaux m JOIN projets p ON m.titre=p.libelle WHERE p.id_projet = ?');
                $q->execute(array($idComp));
                $c = $q->fetch();
                $oldName = $c['titre'];
                $newdata = htmlspecialchars($_POST['modifCompModal']);
                $newdata = str_replace(" ", "_", $newdata);
                $newdata = htmlspecialchars("#" . $newdata);
                $newModId = htmlspecialchars($_POST['modifCompModal']);
                $rqt = $pdo->prepare('UPDATE modaux SET id_mod = ? WHERE titre = ?');
                $rqt->execute(array($newModId, $oldName));
                $rqt2 = $pdo->prepare('UPDATE projets SET data_target = ?  WHERE id_projet = ?');
                $rqt2->execute(array($newdata, $idComp));
                $messageModTarget = 'Ok, contenu de ' . $c['titre'] . ' mis à jour<br>';
            }
            if (isset($_FILES['modifCompImg']['name'])) {
                $uploaddir = '../images/';
                $rqt = $pdo->prepare('SELECT libelle FROM projets WHERE id_projet = ?');
                $rqt->execute(array($idComp));
                $c = $rqt->fetch();
                $nomMin = mb_strtolower($c['libelle']);
                $nomMin = str_replace(" ", "_", $nomMin);
                $uploadfile = $uploaddir . $nomMin . ".png";
                if (move_uploaded_file($_FILES['modifCompImg']['tmp_name'], $uploadfile)) {
                    $messageModImg = "Ok, image de " . $idComp . ' modifiée <br>';
                } else {
                    echo "Erreur envoi image : " . $_FILES['modifCompImg']['error'];
                }
            }
        }
        /* Les messages de "Log" */
        $messageMod = "";
        if (isset($messageModName)) {
            $messageMod = $messageMod . $messageModName;
        } else {
            $messageMod = $messageMod . "Le nom n'a pas été modifié<br>";
        }
        if (isset($messageModAlt)) {
            $messageMod = $messageMod . $messageModAlt;
        } else {
            $messageMod = $messageMod . "Le alt n'a pas été modifié<br>";
        }
        if (isset($messageModCat)) {
            $messageMod = $messageMod . $messageModCat;
        } else {
            $messageMod = $messageMod . "La catégorie n'a pas été modifiée<br>";
        }
        if (isset($messageModImg)) {
            $messageMod = $messageMod . $messageModImg;
        } else {
            $messageMod = $messageMod . "L'image n'a pas été modifiée<br>";
        }
        if (isset($messageModTarget)) {
            $messageMod = $messageMod . $messageModTarget;
        } else {
            $messageMod = $messageMod . "La target n'a pas été modifiée<br>";
        }
    } else {
        $messageMod = "Veuillez sélectionner une compétence à modifier.";
    }

    /* Ajouter une compétence */
    if (isset($_POST['submitAddComp'])) {
        if ($_POST['AddCompAlt'] == "") {
            $_POST['AddCompAlt'] = NULL;
        }
        if ($_POST['AddCompType'] == "") {
            $_POST['AddCompType'] = NULL;
        }
        if ($_POST['AddCompModal'] == "") {
            $_POST['AddCompModal'] = NULL;
        }
        if ($_FILES['AddCompImg']['name'] == "") {
            $_FILES['AddCompImg']['name'] = NULL;
        }
        if (isset($_POST['AddCompTitre']) && isset($_POST['AddCompAlt']) && isset($_POST['AddCompModal']) && isset($_POST['AddCompType']) && isset($_FILES['AddCompImg']['name'])) {
            $uploaddir = '../images/';
            $nomComp = htmlspecialchars($_POST['AddCompTitre']);
            $nomMin = mb_strtolower($nomComp);
            $nomMin = str_replace(" ", "_", $nomMin);
            $newdata = htmlspecialchars($_POST['AddCompModal']);
            $newdata = str_replace(" ", "_", $newdata);
            $newdata = htmlspecialchars("#" . $newdata);
            $newModId = htmlspecialchars($_POST['AddCompModal']);
            $uploadfile = $uploaddir . $nomMin . ".png";
            $uploadfilename = 'images/' . $nomMin . '.png';
            $thealt = htmlspecialchars($_POST['AddCompAlt']);
            $contenu = htmlspecialchars($_POST['AddCompType']);
            $rqt = $pdo->prepare('SELECT * FROM projets WHERE libelle = ?');
            $rqt->execute(array($nomComp));
            $compExists = $rqt->rowcount();
            if ($compExists == 0) {
                if (move_uploaded_file($_FILES['AddCompImg']['tmp_name'], $uploadfile)) {
                    $rqt = $pdo->prepare('INSERT INTO projets(`libelle`, `alt`, `logo`, `data_target`) VALUES (?, ?, ?, ?)');
                    $rqt->execute(array($nomComp, $thealt, $uploadfilename, $newdata));
                    $rqt2 = $pdo->prepare('INSERT INTO modaux(titre, contenu, id_mod) VALUES (?, ?, ?)');
                    $rqt2->execute(array($nomComp, $contenu, $newModId));
                    $messageAdd = 'Ok, projet ' . $nomComp . 'ajouté';
                } else {
                    echo "Erreur envoi image : " . $_FILES['AddCompImg']['error'];
                }
            } else {
                $messageAdd = 'Un projet similaire existe déjà.';
            }
        } else {
            $messageAdd = '<script>alert("Veuillez remplir tous les champs")</script>';
        }
    }
}

?>