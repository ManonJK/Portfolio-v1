<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav/nav.css">
    <title>Contact</title>
</head>
<body>

<header>
    <?php
    include ('nav/nav.php');
    ?>
</header>

<main class="maincolonne">

    <div id="fond"></div>



    <h1>Contactez-moi !</h1>

    <div class="container">
        <form action="/action_page.php">

            <div>

            <label for="nom">Nom*</label>
            <input type="text" id="nom" name="nom" placeholder="Nom de famille" required>


            <label for="prenom">Prénom*</label>
            <input type="text" id="prenom" name="nom" placeholder="Prénom" required>

            <label for="mail">Adresse mail*</label>
            <input type="email" id="mail" name="mail" placeholder="Ex : votreadressemail@quelquechose.com" required>

            <label for="phone">Numéro de téléphone*</label>
            <input type="tel" id="phone" name="phone" placeholder="Ex : 01 23 45 67 89" required pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$">

            <label for="pays">Pays</label>
            <select id="pays" name="pays">
                <option value="australia">Australia</option>
                <option value="canada">Canada</option>
                <option value="france" selected="selected">France</option>
                <option value="usa">USA</option>
            </select>

            </div>


            <div>

            <label for="message">Votre message</label>
            <textarea id="message" name="message" placeholder="Écrivez votre message..." style="height:200px"></textarea>

            <p>* Champs obligatoires</p>
            <input type="submit" value="Envoyer">

            </div>
        </form>
    </div>

</main>

</body>
</html>