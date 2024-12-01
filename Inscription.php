<?php 
    // Vérification de la validité des informations
    if (isset($_POST['pseudo'])) {
        $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
        if (preg_match("#^[a-z]#i", $_POST['pseudo'])) //On vérifie si le pseudo commence par une lettre de l'alphabet
        {
            $pseudo = $_POST['pseudo'];
        }
        else
        {
            echo "<p id='Connexion' style='top:4%;color:red;'>Votre pseudo doit pas commencer par une lettre (sans accent) !</p>";
        }
    }

    if (isset($_POST['email'])){
        $_POST['email'] = htmlspecialchars($_POST['email']);
        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['email'])) //On vérifie la validité de l'adresse mail
        {
            $email = $_POST['email'];
        }
        else
        {
            echo "<p id='Connexion' style='top:20%;color:red;'>Adresse email invalide</p>";
        }
    }

    // Hachage du mot de passe
    if (isset($_POST['pass'])) {
        if ($_POST['pass']==$_POST['reapeated_pass']){
            $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        }else{
            echo "<p id='Connexion' style='top:12%;color:red;'>Veuillez renseigner 2 fois le même mot de passe.</p>";
        }
    }

    // Insertion
    if (isset($pseudo) && isset($pass_hache) && isset($email)){
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=id12643444_lmbchat', 'id12643444_lmbchat', 'ericopter67');
        }catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
        $req->execute(array(
            'pseudo' => $pseudo,
            'pass' => $pass_hache,
            'email' => $email));
        echo "<p id='Connexion' style='top:20%;color:orange;'>Vous êtes inscrits :) Vous pouvez maintenant vous connecter <a href='index.php' class ='lien'>ici</a></p>";
    }
?>
<!DOCTYPE html>
<html style="height:100%;">
    <head>
        <meta charset="UTF-8">
        <title>LMBDiscord</title>
        <link href="styleconnexion.css" rel="stylesheet" media="all" type="text/css">
        <link rel="icon" type="image/png" href="LMB Discord.png" />
    </head>
    <body>
        <form action="Inscription.php" method="post" id="Connexion">
            <div>
                <input class = "Champs" type="text" id="username" name="pseudo" placeholder="Identifiant" style="border-radius:5px;" required>
            </div>
            <br/>
            <div>
                <input class = "Champs" type="password" id="pass" name="pass" placeholder="Mot de passe"  style="border-radius:5px;" required>
            </div>
            <br/>
            <div>
                <input class = "Champs" type="password" id="repeated_pass" name="reapeated_pass" placeholder="Retaper le mot de passe"  style="border-radius:5px;" required>
            </div>
            <br/>
            <div>
                <input class = "Champs" type="text" id="email" name="email" placeholder="Adresse email"  style="border-radius:5px;" required>
            </div>
                <input type="submit" value="Valider"  class="Valider">
             <p id='Connexion' style='top:100%;color:orange;'> Vous avez un compte ? Connectez vous <a href='index.php' class ='lien'>ici</a> !</p>
        </form>
    </body>
</html>  