<?php 
try{
    $bdd = new PDO('mysql:host=localhost;dbname=id12643444_lmbchat', 'id12643444_lmbchat', '');
}catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}
if (isset($_POST['pseudo'])){
    $pseudo = $_POST['pseudo'];
}
//  Récupération de l'utilisateur et de son pass hashé
if (isset($pseudo)){
    $req = $bdd->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
    $req->execute(array('pseudo' => $pseudo));
    $resultat = $req->fetch();
}

// Comparaison du pass envoyé via le formulaire avec la base
if (isset($_POST['pass']) AND isset($resultat)){

    $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

    if (!$resultat)
    {
        echo "<p id='Connexion' style='top:20%;color:red;'>Mauvais identifiant ou mot de passe !</p>";
    }
    else
    {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $pseudo;
            header("Location: minichat.php");
            exit();
        }
        else {
            echo "<p id='Connexion' style='top:20%;color:red;'>Mauvais identifiant ou mot de passe !</p>";
        }
    }
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
    <body class="deconnect_body">
        <form action="index.php" method="post" id="Connexion">
            <div>
                <input class = "Champs" type="text" id="username" name="pseudo" placeholder="Identifiant" style="border-radius:5px;" required>
            </div>
            <br/>
            <div>
                <input class = "Champs" type="password" id="pass" name="pass" placeholder="Mot de passe"  style="border-radius:5px;" required>
            </div>
                <input type="submit" value="Valider" class="Valider" style="border-radius:5px;">
            <p id='Connexion' style='top:100%;color:orange;'> Vous n'avez pas de compte ? Inscrivez vous <a href='Inscription.php' class ='lien'>ici</a></p>
        </form>
    </body>
</html>

