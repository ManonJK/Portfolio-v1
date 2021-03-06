<?php
if(isset($_SESSION['mdp'])) {
    if (isset($_POST['submitSuppComp'])) {
        if ($_POST['SuppComp'] == "") {
            $_POST['SuppComp'] = NULL;
        }
        if (isset($_POST['SuppComp'])) {
            $idComp = $_POST['SuppComp'];
            $rqt = $pdo->prepare('SELECT libelle FROM competences WHERE id_comp = ?');
            $rqt->execute(array($idComp));
            $c = $rqt->fetch();
            $dir = '../images/';
            $filename = mb_strtolower($c['libelle']) . ".png";
            $dirfile = $dir . $filename;
            unlink($dirfile);
            $rqt = $pdo->prepare('DELETE FROM competences WHERE id_comp = ?');
            $rqt->execute(array($idComp));
            $SuppMsg = 'Ok. Compétence' . $c['libelle'] . 'supprimée';
        } else {
            $SuppMsg = '<script>alert("Aucune compétence à supprimer n\'a été sélectionnée")</script>';
        }
    }

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
        if ($_POST['modifCompAlt'] == "") {
            $_POST['modifCompAlt'] = NULL;
        }

        if (isset($_POST['modifCompName'])) {
            $idComp = htmlspecialchars($_POST['modifCompName']);
            if (isset($_POST['modifCompTitre'])) {
                $q = $pdo->prepare('SELECT libelle FROM competences WHERE id_comp = ?');
                $q->execute(array($idComp));
                $c = $q->fetch();
                $oldName = htmlspecialchars($c['libelle']);
                $oldNameImage = mb_strtolower('../images/' . $oldName . '.png');
                $newName = htmlspecialchars($_POST['modifCompTitre']);
                $newNameImage = mb_strtolower('../images/' . $newName . '.png');
                $newDBNameImage = mb_strtolower('images/' . $newName . '.png');
                rename($oldNameImage, $newNameImage);
                $rqt = $pdo->prepare('UPDATE competences SET libelle = ?, logo = ? WHERE id_comp = ?');
                $rqt->execute(array($newName, $newDBNameImage, $idComp));
                $messageModName = 'Ok, nom de la compétence définie sur ' . $newName . '<br>';
            }
            if (isset($_POST['modifCompAlt'])) {
                $alt = htmlspecialchars($_POST['modifCompAlt']);
                $rqt = $pdo->prepare('UPDATE competences SET alt = ? WHERE id_comp = ?');
                $rqt->execute(array($alt, $idComp));
                $messageModAlt = 'Ok, alt de l\'image défini sur ' . $alt . '<br>';
            }
            if (isset($_POST['modifCompType'])) {
                $cat = htmlspecialchars($_POST['modifCompType']);
                $rqt = $pdo->prepare('UPDATE competences c JOIN categorie_comp cc ON c.id_catcomp = cc.id_catcomp SET c.id_catcomp = ? WHERE c.id_comp = ?');
                $rqt->execute(array($cat, $idComp));
                $messageModCat = 'Ok, compétence de ' . $idComp . ' définie sur ' . $cat . '<br>';
            }
            if (isset($_FILES['modifCompImg']['name'])) {
                $uploaddir = '../images/';
                $rqt = $pdo->prepare('SELECT libelle FROM competences WHERE id_comp = ?');
                $rqt->execute(array($idComp));
                $c = $rqt->fetch();
                $nomMin = mb_strtolower($c['libelle']);
                $uploadfile = $uploaddir . $nomMin . ".png";
                if (move_uploaded_file($_FILES['modifCompImg']['tmp_name'], $uploadfile)) {
                    $messageModImg = "Ok, image de " . $idComp . ' modifiée <br>';
                } else {
                    echo "Erreur envoi image : " . $_FILES['modifCompImg']['error'];
                }
            }
        }

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
    } else {
        $messageMod = "Veuillez sélectionner une compétence à modifier.";
    }


    if (isset($_POST['submitAddComp'])) {
        if ($_POST['AddCompAlt'] == "") {
            $_POST['AddCompAlt'] = NULL;
        }
        if ($_POST['AddCompType'] == "") {
            $_POST['AddCompType'] = NULL;
        }
        if ($_FILES['AddCompImg']['name'] == "") {
            $_FILES['AddCompImg']['name'] = NULL;
        }
        if (isset($_POST['AddCompTitre']) && isset($_POST['AddCompAlt']) && isset($_POST['AddCompType']) && isset($_FILES['AddCompImg']['name'])) {
            $uploaddir = '../images/';
            $nomComp = htmlspecialchars($_POST['AddCompTitre']);
            $nomMin = mb_strtolower($nomComp);
            $uploadfile = $uploaddir . $nomMin . ".png";
            $uploadfilename = 'images/' . $nomMin . '.png';
            $thealt = htmlspecialchars($_POST['AddCompAlt']);
            $cat = htmlspecialchars($_POST['AddCompType']);
            $rqt = $pdo->prepare('SELECT * FROM competences WHERE libelle = ?');
            $rqt->execute(array($nomComp));
            $compExists = $rqt->rowcount();
            if ($compExists == 0) {
                if (move_uploaded_file($_FILES['AddCompImg']['tmp_name'], $uploadfile)) {
                    $rqt = $pdo->prepare('INSERT INTO competences(libelle,alt,id_catcomp, logo) VALUES (?, ?, ?, ?)');
                    $rqt->execute(array($nomComp, $thealt, $cat, $uploadfilename));
                    $messageAdd = 'Ok, compétence' . $nomComp . 'ajoutée';
                } else {
                    echo "Erreur envoi image : " . $_FILES['AddCompImg']['error'];
                }
            } else {
                $messageAdd = 'Une compétence similaire existe déjà.';
            }
        } else {
            $messageAdd = '<script>alert("Veuillez remplir tous les champs")</script>';
        }
    }
}

?>