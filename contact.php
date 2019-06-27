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
    <?php
    include ('nav.php');
    ?>
</header>

<main class="maincolonne">

    <div class="fond"></div>

    <h1>Contactez-moi !</h1>

    <div class="container">
        <form action="/action_page.php">

            <div>
                <label for="nom">Nom*</label>
                <input type="text" id="nom" name="nom" placeholder="Nom de famille" required>


                <label for="prenom">Prénom*</label>
                <input type="text" id="prenom" name="nom" placeholder="Prénom" required>

                <label for="mail">Adresse mail</label>
                <input type="email" id="mail" name="mail" placeholder="Ex : votreadressemail@quelquechose.com">

                <label for="phone">Numéro de téléphone*</label>
                <input type="tel" id="phone" name="phone" placeholder="Ex : 01 23 45 67 89" required pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$">
            </div>


            <div>
                <label for="message">Votre message*</label>
                <textarea id="message" name="message" placeholder="Écrivez votre message..." required></textarea>

                <p>* Champs obligatoires</p>
                <input type="submit" value="Envoyer">
            </div>
        </form>
    </div>

</main>

<?php
include ('footer.php');
?>

</body>
</html>