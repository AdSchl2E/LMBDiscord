<?php 
session_start(); 											//Lancement de la session
if (isset($_POST['Oui'])){									//Si l'utilisateur à cliquer sur oui
    session_destroy();											//On détruit sa session 
    header('location: index.php');                              //et on le redirige vers la page de connexion
}elseif(isset($_POST['Non'])){								//Sinon
    header('location: minichat.php');							//On le redirige vers le minichat
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LMBDiscord</title>
        <link href="styleconnexion.css" rel="stylesheet" media="all" type="text/css">
        <link rel="icon" type="image/png" href="LMB Discord.png" />
        <script src="script_minichat.js"></script>
    </head>
    <body class="deconnect_body">
    	<form method="post" action="Deconnect.php" class="DeconnectForm">
    		<p>Etes vous sûr de vouloir vous déconnecter ?</p>
    		<input class="DeconnectOui" type="submit" value="Oui" name="Oui">
    		<input class="DeconnectNon" type="submit" value="Non" name="Non">
    	</form>    	
    </body>
</html>
