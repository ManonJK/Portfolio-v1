<?php
session_start(); #On start la session

require_once('db.php'); #On fait le lien avec la bdd

#requête qui nous sert à envoyer le message ainsi que les infos lorsqu'on clique sur le bouton d'envoi
if(isset($_POST['send'])) {
    $rqtMessage = "INSERT INTO messages(`nom`, `prenom`, `mail`, `phone`, `message`) VALUES (?, ?, ?, ?, ?)";
    $stmtMessage = $pdo->prepare($rqtMessage);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    $stmtMessage->execute(array($nom, $prenom, $mail, $phone, $message));
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="N'hésitez pas à me laisser un message !"/>
    <link rel="stylesheet" href="style.css">
    <title>Manon JULIEN KUENTZ - Contact</title>
</head>
<body>

<header>
    <?php #On inclut la navbar
    include ('nav.php');
    ?>
</header>

<main class="maincolonne">

    <div class="fond"></div>

    <h1>Contactez-moi !</h1>

    <!--On créé le formulaire de contact-->

    <div class="container">
        <form action="contact.php" method="post" id="contactform">

            <div>
                <label for="nom">Nom*</label>
                <input type="text" id="nom" name="nom" placeholder="Nom de famille" required>


                <label for="prenom">Prénom*</label>
                <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>

                <label for="mail">Adresse mail</label>
                <input type="email" id="mail" name="mail" placeholder="Ex : votreadressemail@quelquechose.com">

                <label for="phone">Numéro de téléphone</label>
                <input type="tel" id="phone" name="phone" placeholder="Ex : 01 23 45 67 89">
            </div>

            <div>
                <label for="message">Votre message*</label>
                <textarea id="message" name="message" placeholder="Écrivez votre message..." required></textarea>

                <p>* Champs obligatoires</p>
                <input type="submit" value="Envoyer" name="send">
            </div>
        </form>
    </div>

</main>

<?php #On inclut le footer
include ('footer.php');
?>

</body>
</html>